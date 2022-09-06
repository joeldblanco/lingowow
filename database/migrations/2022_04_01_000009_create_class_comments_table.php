<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('comment')->nullable();
            $table->bigInteger('class_id',false,true);

            $table->bigInteger('author',false,true);//

            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('class_id')->references('id')->on('classes');//
            $table->foreign('author')->references('id')->on('users');//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_comments');
    }
}
