<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSubChannels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sub_channels', function (Blueprint $table) {
            $table->string('course_id', 30);
            $table->string('title', 30);
            $table->string('start_status', 30);//1啟用 2未啟用
            $table->string('date', 30);
            $table->string('display_status', 30);//1啟用 2未啟用
            $table->string('tag', 30);
            $table->string('sub_id', 30);
            $table->string('master_id', 30);
            $table->string('name', 30);
            $table->string('status', 30);
            $table->string('sort', 30);
            $table->string('url', 30);
            $table->string('position', 30);
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
        Schema::dropIfExists('course_sub_channels');
    }
}
