<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admin_users', function (Blueprint $table) {
        $table->increments('id');
        $table->string('email',255)->nulltable(false)->unique('email');
        $table->string('password', 255)->nulltable(false);
        $table->string('remember_token',100)->nulltable(true);
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
