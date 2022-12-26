<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_units', function (Blueprint $table) {
            $table->id();
            $table->string('group_name',40);
            $table->bigInteger('module_id')->unsigned();
            $table->string('priority',10);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_units');
    }
}
