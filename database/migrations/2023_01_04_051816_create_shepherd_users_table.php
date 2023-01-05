<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShepherdUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shepherd_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // ID del usuario que ha completado el recorrido guiado
            $table->string('tour_name',50); // ID del recorrido guiado completado
            $table->unique(['user_id', 'tour_name']); // Establecer clave única a la combinación de usuario y recorrido guiado

            // Establecer claves foráneas a la tabla de usuarios y de recorridos guiados

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // $table->foreign('tour_id')->references('id')->on('shepherd_tours')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shepherd_users');
    }
}
