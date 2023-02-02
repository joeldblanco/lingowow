<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveNextScheduleFromSchedules extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn('next_schedule');
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->longText('next_schedule')->nullable()->after('selected_schedule');
        });
    }
}
