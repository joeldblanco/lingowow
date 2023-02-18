<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->renameColumn('answer_data', 'answer');
            $table->bigInteger('question_id')->unsigned()->after('attempt_id');
            $table->tinyInteger('score')->unsigned()->nullable()->after('answer_data');
            $table->dropColumn('answer_content');

            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->renameColumn('answer', 'answer_data');
            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
            $table->text('answer_content')->nullable();
            $table->dropColumn('score');
        });
    }
}
