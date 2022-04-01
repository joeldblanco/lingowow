<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_unit', function (Blueprint $table) {
            $table->bigInteger('id_user', false, true);
            $table->bigInteger('id_unit', false, true);
            $table->float('nota')->nullable();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_unit')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation_unit');
    }
}
