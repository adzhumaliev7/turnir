<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersProfile2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('users_profile2', function (Blueprint $table) {
        $table->increments('id');
        $table->string('doc_photo',255);
        $table->string('doc_photo2', 255);
        $table->string('phone', 100);
        $table->string('fio', 255);
        $table->string('email',255)->nulltable(false)->unique('email');
        $table->string('country', 255);
        $table->timestamp('timezone');
        $table->string('city', 255);
        $table->date('bdate');
        $table->string('nickname',100);
        $table->string('game_id',50);
  
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
