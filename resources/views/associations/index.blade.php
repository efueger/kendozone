@extends('layouts.dashboard')
@section('breadcrumbs')
    {!! Breadcrumbs::render('associations.index') !!}

@stop

@section('content')



    <div class="container-fluid">

        @if (sizeof($associations)==0)
            {{--            @include('layouts.noFederations')--}}
        @else



            <table class="table table-togglable table-hover">
                <thead>
                <tr>

                    <th class="text-center" data-toggle="true">{{ trans_choice('core.name',1) }}</th>
                    <th class="text-center" data-hide="phone">{{ trans_choice('core.federation',1) }}</th>
                    <th class="text-center" data-hide="all">{{ trans('core.association.president') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.email') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.association.address') }}</th>
                    <th class="text-center" data-hide="tablet">{{ trans('core.association.phone') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.country') }}</th>
                    <th class="text-center" data-hide="phone">{{ trans('core.action') }}</th>

                </tr>
                </thead>
                @foreach($associations as $association)
                    <tr>
                        <td align="center"><a
                                    href="{!!   URL::action('AssociationController@edit',  $association->id) !!}">{{ $association->name }}</a>
                        </td>
                        <td align="center">{{ $association->federation->name }}</td>
                        <td align="center">{{ $association->president->name }}</td>
                        <td align="center">{{ $association->president->email }}</td>
                        <td align="center">{{ $association->address }}</td>
                        <td align="center">{{ $association->phone }}</td>
                        <td align="center"><img src="images/flags/{{ $association->federation->country->flag }}" /></td>
                        <td align="center"><a href="{{URL::action('AssociationController@edit', $association->id)}}"><i class="icon icon-pencil7"></i></a></td>

                    </tr>

                @endforeach


            </table>
        @endif


    </div>

    @include("errors.list")
@stop
@section('scripts_footer')
    {!! Html::script('js/pages/header/footable.js') !!}
    <script>
        $(function () {

            // Initialize responsive functionality
            $('.table-togglable').footable();

        });
    </script>

@stop