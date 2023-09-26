<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed authors
        Author::factory(10)->create();

        // Seed books with relationships to authors
        Book::factory(20)->create()->each(function ($book) {
            $authors = Author::inRandomOrder()->limit(rand(1, 3))->get();
            $book->authors()->attach($authors);
        });
    }
}
