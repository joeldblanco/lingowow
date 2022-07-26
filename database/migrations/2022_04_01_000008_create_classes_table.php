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
            $table->bigInteger('enrolment_id',false,true);
            $table->tinyInteger('teacher_check', false, true)->default(0);
            $table->tinyInteger('student_check', false, true)->default(0);
            $table->tinyInteger('status', false, true)->nullable();
            $table->timestamps();

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
