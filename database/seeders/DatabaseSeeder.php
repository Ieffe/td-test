<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\Author;
// use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        \App\Models\Author::factory(100)->create();
        \App\Models\Category::factory(300)->create();
        \App\Models\Book::factory(10000)->create();
        \App\Models\Review::factory(50000)->create();
    }
}
