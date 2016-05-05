<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamTable extends Migration
{

    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_tournament_id')->unsigned(); // A checar
            $table->integer('name')->unsigned();
            $table->integer('picture')->unsigned();
            $table->timestamps();


            $table->foreign('category_tournament_id')
                ->references('id')
                ->on('category_tournament')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });

        Schema::create('team_member', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned(); // A checar
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('team_id')
                ->references('id')
                ->on('team')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('user')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unique(['team_id', 'user_id']);

        });
    }

    public function down()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('team');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}