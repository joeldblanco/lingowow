<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInMeetingsTable extends Migration
{
    public function up()
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->renameColumn('attendee_id', 'attendee_id');
        });
    }

    public function down()
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->renameColumn('attendee_id', 'attendee_id');
        });
    }
}
