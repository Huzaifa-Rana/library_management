<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample books
        Book::create(['title' => '1984', 'author_id' => 1, 'publication_year' => 1949, 'is_available' => true]);
        Book::create(['title' => 'Harry Potter and the Sorcerer\'s Stone', 'author_id' => 2, 'publication_year' => 1997, 'is_available' => true]);
        Book::create(['title' => 'The Hobbit', 'author_id' => 3, 'publication_year' => 1937, 'is_available' => true]);
        Book::create(['title' => 'Murder on the Orient Express', 'author_id' => 4, 'publication_year' => 1934, 'is_available' => true]);
        Book::create(['title' => 'The Adventures of Tom Sawyer', 'author_id' => 5, 'publication_year' => 1876, 'is_available' => true]);
    }
}
