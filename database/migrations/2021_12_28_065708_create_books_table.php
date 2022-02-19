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
            $table->increments('id');
            $table->string('title');
            $table->string('link')->nullable(true);
            $table->string('author');
            $table->string('category')->nullable(true);
            $table->text('guid')->nullable(true);
            $table->string('isbn')->nullable(true);
            $table->string('booksGenreId')->nullable(true);
            $table->string('publisherName')->nullable(true);
            $table->text('largeImageUrl')->nullable(true);
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
        Schema::dropIfExists('books');
    }
}
