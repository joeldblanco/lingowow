<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesDictationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_dictation', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('content_id')->unsigned();       
            $table->longText('dictation_group'); //[["Direccion del audio", "Palabra"]]
            $table->string('mode',20);
            $table->timestamps();
            
            $table->foreign('content_id')->references('id')->on('content_of_act');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_dictation');
    }
}
