<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_channels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('master_channels_id', 30);
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
        Schema::dropIfExists('sub_channels');
    }
}
