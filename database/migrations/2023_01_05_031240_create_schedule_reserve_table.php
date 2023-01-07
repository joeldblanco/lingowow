<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleReserveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_reserve', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id', false, true);
            $table->bigInteger('teacher_id')->nullable();
            $table->longText('selected_schedule')->nullable();
            $table->string('type',40)->default('schedule');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_reserve');
    }
}
