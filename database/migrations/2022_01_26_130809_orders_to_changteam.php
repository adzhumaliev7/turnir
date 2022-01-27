<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersToChangteam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
             Schema::create('orders_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->string(50);
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
        Schema::table('changteam', function (Blueprint $table) {
            //
        });
    }
}
