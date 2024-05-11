<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Book::truncate();
        Book::create([
            'title' => 'laravel',
            'author' => 'someone',
            'price' => 999,
            'category_id' => 1,
        ]);
        Book::create([
            'title' => 'php',
            'author' => 'someone',
            'price' => 999,
            'category_id' => 2,
        ]);
    }
}
