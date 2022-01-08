<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Test extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('test', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('turnir_id');
        $table->integer('team_id');
        $table->integer('stage');
        $table->string('status', 100);
        $table->integer('game_id');
        $table->integer('winner');
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
