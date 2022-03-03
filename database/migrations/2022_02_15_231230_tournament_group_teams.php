<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TournamentGroupTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_group_teams', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('group_id')->unsigned();
            $table->integer('tournament_id')->unsigned();
            $table->integer('team_id')->unsigned()->comment('Айди команды таблица team');
            $table->integer('stage_id')->unsigned();

            $table->integer('kills_pts')->nullable();
            $table->integer('place_pts')->nullable();

            $table->foreign('group_id')->references('id')->on('tournament_groups')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('team_id')->references('id')->on('team')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('stage_id')->references('id')->on('stages')
                ->onUpdate('cascade')->onDelete('cascade');

//            $table->integer('status')->nullable();

//            $table->integer('total_pts')->nullable();
//            $table->integer('winner')->nullable();
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
