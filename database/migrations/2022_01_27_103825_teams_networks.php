<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamsNetworks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_networks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->string('insta',50)->nullable();
            $table->string('discord',50)->nullable();
            $table->string('vk',50)->nullable();
            $table->string('facebook',50)->nullable();
            $table->string('youtube',50)->nullable();
            $table->string('telegram',50)->nullable();
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
