<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('download_link');
            $table->string('image_link');
            $table->unsignedBigInteger('sub_category_id');
            $table->string('language');
            $table->string('size');
            $table->integer('is_hot');
            $table->integer('another_language');
            $table->string('another_language_text');
            $table->unsignedBigInteger('author_id');
            $table->string('page');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
           $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
