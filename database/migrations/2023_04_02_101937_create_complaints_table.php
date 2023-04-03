<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateComplaintsTable extends Migration
{
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->string('subject');
            $table->text('complaint');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}

