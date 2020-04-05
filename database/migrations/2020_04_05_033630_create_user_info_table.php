<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 30);
            $table->datetime('birthday', 0);
            $table->string('counties', 30);
            $table->string('districts', 30);
            $table->string('road', 30);
            $table->string('gender', 1);
            $table->string('email', 30);
            $table->string('interest', 30);
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
        Schema::dropIfExists('user_info');
    }
}
