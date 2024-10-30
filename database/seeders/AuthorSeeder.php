<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample authors
        Author::create(['name' => 'George Orwell']);
        Author::create(['name' => 'J.K. Rowling']);
        Author::create(['name' => 'J.R.R. Tolkien']);
        Author::create(['name' => 'Agatha Christie']);
        Author::create(['name' => 'Mark Twain']);
    }
}
