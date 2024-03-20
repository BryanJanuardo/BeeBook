<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('ISBN');
            $table->string('FeedbackId')->default('0');
            $table->string('PublisherName');
            $table->string('AuthorName');
            $table->text('AuthorAddress');
            $table->string('PublishDate');
            $table->string('BookTitle');
            $table->string('BookGenre');
            $table->string('BookPrice')->nullable();
            $table->string('BookPage');
            $table->string('BookPicture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
