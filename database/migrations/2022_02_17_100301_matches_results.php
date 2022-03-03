<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MatchesResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_matches_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('team_id')->unsigned()->comment('Айди игрока из таблицы tournaments_members');
            $table->integer('tournament_group_teams_id')->unsigned();

            $table->integer('kills_pts')->nullable();
            $table->integer('place_pts')->nullable();


            $table->foreign('match_id')->references('id')->on('tournament_matches')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('team_id')->references('id')->on('tournaments_members')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tournament_group_teams_id')->references('id')->on('tournament_group_teams')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
