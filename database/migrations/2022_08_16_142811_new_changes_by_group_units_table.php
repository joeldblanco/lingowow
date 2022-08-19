<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewChangesByGroupUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Changes on units
        Schema::table('units', function ($table) {
            $table->dropForeign('units_module_id_foreign');
            $table->renameColumn('module_id', 'group_id');
            $table->foreign('group_id')->references('id')->on('group_units');
         });

        //Changes on exams
        Schema::table('exams', function ($table) {
            $table->dropForeign('exams_unit_id_foreign');
            $table->renameColumn('unit_id', 'group_id');
            $table->foreign('group_id')->references('id')->on('group_units');
         });

        //Changes on evaluation_unit
        Schema::table('evaluation_unit', function ($table) {
            $table->dropForeign('evaluation_unit_unit_id_foreign');
            $table->renameColumn('unit_id', 'group_id');
            $table->foreign('group_id')->references('id')->on('group_units');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Changes on units
        Schema::table('units', function (Blueprint $table) {
            $table->dropForeign('units_group_id_foreign');
            $table->dropColumn('group_id');
        });

        // Changes on exams
        Schema::table('exams', function (Blueprint $table) {
            $table->dropForeign('exams_group_id_foreign');
            $table->dropColumn('group_id');
        });

        //Changes on evaluation_unit
        Schema::table('evaluation_unit', function (Blueprint $table) {
            $table->dropForeign('evaluation_unit_group_id_foreign');
            $table->dropColumn('group_id');
        });
    }
}
