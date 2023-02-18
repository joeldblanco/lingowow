<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->bigInteger('exam_id')->unsigned()->after('id');
            $table->string('title', 250)->nullable()->after('exam_id');
            $table->string('answer', 250)->nullable()->after('data');
            $table->renameColumn('data', 'options');
            $table->renameColumn('value', 'marks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('exam_id');
            $table->dropColumn('title');
            $table->dropColumn('answer');
            $table->renameColumn('options', 'data');
            $table->renameColumn('marks', 'value');
        });
    }
}
