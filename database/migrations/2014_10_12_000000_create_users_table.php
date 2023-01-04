<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->string('username', 50)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_photo_path')->default('profile-photos/default_pp.jpg');
            $table->rememberToken();

            $table->tinyInteger('status')->unsigned()->default('1');
            $table->text('selected_schedule')->nullable();
            $table->text('available_schedule')->nullable();
            $table->string('meeting_id', 255)->nullable();
            //$table->text('two_factor_secret')->nullable();
            //$table->text('two_factor_recovery_codes')->nullable();
            $table->string('street', 100)->nullable()->default(null);
            $table->string('city', 50)->nullable()->default(null);
            $table->string('country', 50)->nullable()->default(null);
            $table->string('zip_code', 10)->nullable()->default(null);
            $table->bigInteger('current_team_id', false, true)->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
