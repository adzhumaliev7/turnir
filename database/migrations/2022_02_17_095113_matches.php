<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Matches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournament_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('match_name',50)->nullable();

            $table->integer('group_id')->unsigned();
            $table->integer('tournament_id')->unsigned();
            $table->integer('stage_id')->unsigned();

            $table->string('login')->nullable();
            $table->string('password')->nullable();


            $table->foreign('group_id')->references('id')->on('tournament_groups')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('stage_id')->references('id')->on('stages')
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
