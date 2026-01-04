<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CollectionSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Ambil semua category ids
        $categoryIds = DB::table('category_collections')->pluck('id');
        $featuredIds = DB::table('featured_designs')->pluck('id');

        for ($i = 1; $i <= 10; $i++) {
            DB::table('collections')->insert([
                'category_id' => $faker->randomElement($categoryIds),
                'featured_design_id' => $faker->randomElement($featuredIds),
                'name' => $faker->sentence(2),
                'image' => 'collection/default.webp',
                'description' => $faker->paragraph(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
