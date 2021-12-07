<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tournament extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tournaments', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name', 100);
        $table->string('tournament_start' ,255);
        $table->string('country' ,255);
        $table->string('countries' ,255);
        $table->string('format' ,255);
        $table->string('games_time' ,255);
        $table->string('timezone' ,255);
        $table->string('players_col', 100);

        $table->string('file_1', 100);
        $table->text('description');
        $table->string('start_reg', 100);
        $table->string('slot_kolvo', 100);
        $table->string('end_reg', 100);
        $table->string('ligue', 100);
        $table->string('rule', 100);
        $table->string('layouts', 100);
        $table->string('header', 100);
        $table->text('description2');
        $table->string('date_t');
        $table->time('time_t');
        $table->string('file_2', 100);
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
