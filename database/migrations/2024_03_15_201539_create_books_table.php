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
            $table->string('ISBN')->primary();
            $table->string('PublisherName');
            $table->string('AuthorName');
            $table->date('PublishDate');
            $table->string('BookTitle');
            $table->bigInteger('BookPrice')->nullable();
            $table->integer('BookPage');
            $table->string('BookPicture')->nullable();
            $table->string('BookFile')->nullable();
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
