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
           Schema::create('tournamets_team', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('tournament_id')->unsigned();
        $table->integer('team_id')->unsigned()->comment('Поле из team');
        $table->string('status', 100);

        $table->foreign('tournament_id')->references('id')->on('tournaments')
            ->onUpdate('cascade')->onDelete('cascade');

        $table->foreign('team_id')->references('id')->on('team')
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
