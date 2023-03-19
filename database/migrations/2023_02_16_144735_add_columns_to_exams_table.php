<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
            $table->text('description')->nullable()->after('title');
            $table->smallInteger('total_marks')->unsigned()->after('min_score');
            $table->smallInteger('duration')->unsigned()->after('total_marks');
            $table->tinyInteger('status')->default(0)->after('duration');
            $table->renameColumn('min_score', 'passing_marks')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exams', function (Blueprint $table) {
            $table->renameColumn('passing_marks', 'min_score');
            $table->dropColumn('total_marks');
            $table->dropColumn('duration');
            $table->dropColumn('status');
            $table->dropColumn('title');
            $table->dropColumn('description');
        });
    }
}
