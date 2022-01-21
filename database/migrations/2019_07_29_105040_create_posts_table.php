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
        Schema::create('posts', static function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('headline');
            $table->text('content');
            $table->string('media')->nullable();
            $table->string('media_type')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }
}
