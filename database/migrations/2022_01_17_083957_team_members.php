<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tournament_id')->unsigned();
            $table->integer('team_id')->unsigned()->comment('Id команды из таблицы team');
            $table->integer('user_id')->unsigned();

            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('team_id')->references('id')->on('team')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->foreign('user_id')->references('id')->on('users')
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
