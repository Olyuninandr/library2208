<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Author::class, 10)->create();
        factory(App\Models\Book::class, 100)->create();
        factory(App\User::class, 5)->create();
    }
}
