<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorySeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('stories')->insert([
                'title' => $faker->sentence(3),
                'content' => $faker->paragraphs(3, true),
                'image' => 'stories/default.webp', // default image, bisa diganti
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
