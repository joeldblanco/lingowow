<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('selected_schedule')->nullable();
            $table->longText('next_schedule')->nullable();//
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('enrolment_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['user_id', 'enrolment_id']); // Establecer clave única a la combinación de usuario y enrolment
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
