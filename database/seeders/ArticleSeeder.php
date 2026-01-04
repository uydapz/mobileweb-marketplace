<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $articles = [];

        // Contoh generate 10 artikel
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(6, true);
            $articles[] = [
                'user_id' => DB::table('users')->inRandomOrder()->value('id'),
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => $faker->paragraphs(5, true),
                'image' => 'article/default.webp',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('articles')->insert($articles);
    }
}
