<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_content', function (Blueprint $table) {
            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('content_id')->unsigned();

            $table->foreign('activity_id')->references('id')->on('activities');
            $table->foreign('content_id')->references('id')->on('content_of_act');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_content');
    }
}
