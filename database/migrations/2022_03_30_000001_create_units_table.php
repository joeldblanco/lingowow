<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unit_name',40);
            $table->string('slide_url',255);
            $table->string('doc_url',255);
            $table->string('audio_url',255);
            $table->string('forum_name',50)->nullable();
            $table->string('forum_url',255)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->bigInteger('module_id',false,true);
            $table->timestamps();

            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
};
