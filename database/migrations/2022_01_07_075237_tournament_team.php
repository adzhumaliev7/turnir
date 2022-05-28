<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TournamentTeam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('touenamets_team', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('tournament_id');
        $table->integer('team_id');
        $table->string('status', 100);
        $table->integer('group_id');
     
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
