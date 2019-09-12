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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('snippet')->nullable();
            $table->longText('body')->nullable();
            $table->tinyInteger('is_sticky')->default(0);
            $table->tinyInteger('is_visible')->default(0);
            $table->tinyInteger('is_video')->default(0);
            $table->datetime('published_at')->nullable();
            $table->datetime('unpublished_at')->nullable();
            $table->string('permalink')->nullable();
            $table->string('image_src')->nullable();
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
