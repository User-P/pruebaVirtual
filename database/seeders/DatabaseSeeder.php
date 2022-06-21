<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ArticleSeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/articles');
        Storage::makeDirectory('public/articles');
        $this->call(UserSeeder::class);
        // $this->call(ArticleSeeder::class);
    }
}
