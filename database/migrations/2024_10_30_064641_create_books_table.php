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
            $table->id();
            $table->string('title', 255);
            $table->unsignedBigInteger('author_id');
            $table->integer('publication_year')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            // Define foreign key after the columns
            $table->foreign('author_id') // Define foreign key
                ->references('id')->on('authors') // References authors table
                ->onDelete('cascade'); // Cascading delete
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
