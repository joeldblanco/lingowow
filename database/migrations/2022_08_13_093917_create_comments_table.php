<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id', false, true);
            // $table->bigInteger('post_id',false,true);
            $table->string('content',255);
            $table->bigInteger('commentable_id', false, true);
            $table->string('commentable_type',255);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')->references('id')->on('users');
            // $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
