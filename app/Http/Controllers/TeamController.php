<?php

namespace App\Http\Controllers;

use App\Championship;
use App\Http\Requests\TeamRequest;
use App\Team;
use App\Tournament;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class TeamController extends Controller
{

    protected $currentModelName;

    public function __construct()
    {
        $this->currentModelName = trans_choice('core.team', 1);
        View::share('currentModelName', $this->currentModelName);
    }

    /**
     * Display a listing of the teams for a tournament.
     *
     * @param Tournament $tournament
     * @return View
     */
    public function index(Tournament $tournament)
    {
        $tournament = Tournament::with(['championships' => function ($query) {
            $query->with('teams')
                ->whereHas('category', function ($subquery) {
                    $subquery->where('isTeam', '=', 1);
                });
        }])->withCount('competitors', 'teams')
            ->find($tournament->id);


        $arrChampionshipsWithTeamsAndCompetitors = $tournament->championships->map(function ($championship) {
            $competitors = $championship->competitors->map(function ($competitor) {
                return ["id" => $competitor->id, "name" => $competitor->user->name];
            })->toArray();
            $teams = $championship->teams->map(function ($team) {
                return ["id" => $team->id, "name" => $team->name, 'competitors' => $team->with('user')];
            })->toArray();

            $tempAssignCompatitors = new Collection();
            $assignedCompetitors = $this->getAssignedCompetitors($championship, $tempAssignCompatitors);

            $freeCompetitors = $championship->competitors;
            if ($assignedCompetitors != null) {
                $freeCompetitors = $freeCompetitors->diff($assignedCompetitors);
            }

            return ['championship' => $championship->id, 'competitors' => $competitors, 'freeCompetitors' => $freeCompetitors, 'teams' => $teams];
        })->toArray();

        return view("teams.index", compact('tournament', 'arrChampionshipsWithTeamsAndCompetitors'));

    }

    /**
     * @param $championship
     * @param $tempAssignCompatitors
     * @return mixed
     */
    private function getAssignedCompetitors($championship, $tempAssignCompatitors)
    {
        return $championship->teams->reduce(function ($acc, $team) use ($tempAssignCompatitors) {
            return $tempAssignCompatitors->push($team->competitors()->with('user')->get())->collapse();
        });
    }

    /**
     * Show the form for creating a new competitor.
     *
     * @param Tournament $tournament
     * @return View
     * @throws AuthorizationException
     */
    public function create(Tournament $tournament)
    {
        $team = new Team;
        $this->authorize('create', [Team::class, $tournament, Auth::user()]);
        return view("teams.form", compact('tournament', 'team', 'cts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Championship $championship
     * @return View
     * @throws AuthorizationException
     */
    public function store(Request $request, Championship $championship)
    {
        $this->authorize('store', [Team::class, $championship->tournament, Auth::user()]);
        try {
            $team = Team::where('championship_id', $championship->id)->orderBy('id', 'desc')->first();
            $short_id = 1;
            if ($team != null) {
                $short_id = $team->short_id + 1;
            }
            $request->request->add(['short_id' => $short_id]);
            $team = Team::create($request->all());
            flash()->success(trans('msg.team_create_successful', ['name' => $team->name]));
        } catch (QueryException $e) {
            flash()->error(trans('msg.team_create_error_already_exists', ['name' => $request->name]));
        }

        return back()->with('activeTab', $request->activeTab);
    }

    /**
     * Show the form for creating a new competitor.
     *
     * @param Tournament $tournament
     * @param $teamId
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Tournament $tournament, $teamId)
    {
        $team = Team::findOrFail($teamId);
        $this->authorize('edit', [Team::class, $tournament, Auth::user()]);

        $cts = $tournament->buildCategoryList();
        return view("teams.form", compact('tournament', 'team', 'cts'));
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param TeamRequest $request
     * @param Tournament $tournament
     * @param $teamId
     * @return Response
     * @throws AuthorizationException
     */
    public function update(TeamRequest $request, Tournament $tournament, $teamId)
    {
        $team = Team::findOrFail($teamId);
        $this->authorize('update', [Team::class, $tournament, Auth::user()]);

        $team->update($request->all());
        flash()->success(trans('msg.team_edit_successful', ['name' => $team->name]));
        return redirect()->route('teams.index', $tournament->slug);

    }

    /**
     * Remove the Team from storage.
     *
     * @param Team $team
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(Team $team)
    {
        $tournament = $team->championship->tournament;
        $this->authorize('delete', [Team::class, $tournament, Auth::user()]);

        if ($team->forceDelete()) {
            return Response::json(['msg' => Lang::get('msg.team_delete_successful', ['name' => $team->name]), 'status' => 'success']);
        }
        return Response::json(['msg' => Lang::get('msg.team_delete_error', ['name' => $team->name]), 'status' => 'error']);
    }
}
