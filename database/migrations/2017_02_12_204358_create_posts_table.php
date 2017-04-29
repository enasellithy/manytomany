<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longtext('body');
            $table->integer('user_id');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->longtext('video');
            $table->integer('active')->asdefine(0);
            $table->integer('slider')->asdefine(0);
            $table->integer('category_id')->unsigned();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('posts');
    }
}
