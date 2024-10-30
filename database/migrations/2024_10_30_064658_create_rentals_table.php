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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->string('renter_name', 255);
            $table->timestamp('rented_at')->useCurrent();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();

            // Define foreign key after the columns
            $table->foreign('book_id') // Foreign key definition
                ->references('id')->on('books') // References the books table
                ->onDelete('cascade'); // Cascading delete for when a book is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
