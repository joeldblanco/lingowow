<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description',100)->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->bigInteger('enrolment_id')->unsigned();
            $table->string('meeting_id')->nullable();
            $table->tinyInteger('teacher_check')->unsigned()->default(0);
            $table->tinyInteger('student_check')->unsigned()->default(0);
            $table->tinyInteger('status')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('enrolment_id')->references('id')->on('enrolments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
