<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $articles = Article::factory(10)->create();

        // foreach ($articles as $article) {
        //     $article->image()->create([
        //         'imageable_id' => $article->id,
        //         'imageable_type' => Article::class,
        //         'url' => 'articles/' . $faker->image(public_path('storage/articles'), 400, 300, null, false)
        //     ]);
        // }
    }
}
