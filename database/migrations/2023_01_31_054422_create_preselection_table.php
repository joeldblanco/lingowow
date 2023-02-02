<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreselectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preselection', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('enrolment_id')->unsigned()->unique();
            $table->longText('schedule');
            $table->bigInteger('teacher_id')->unsigned();
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
        Schema::dropIfExists('preselection');
    }
}
