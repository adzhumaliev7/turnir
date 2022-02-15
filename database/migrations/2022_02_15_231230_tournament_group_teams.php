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
            $table->integer('group_id')->nullable();
            $table->string('group_number_id', 50)->nullable();
            $table->integer('tournament_id')->nullable();
            $table->integer('team_id')->nullable();
            $table->integer('stage_id')->nullable();
            $table->integer('match_id')->nullable();
         
            $table->integer('status')->nullable();
            $table->integer('kills_pts')->nullable();
            $table->integer('place_pts')->nullable();
            $table->integer('total_pts')->nullable();
            $table->integer('winner')->nullable();
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
