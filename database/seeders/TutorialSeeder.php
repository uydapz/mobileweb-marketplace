<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutorialSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('tutorials')->insert([
                'title' => $faker->sentence(4),
                'content' => $faker->paragraph(3),
                'image' => '/tutorial/default.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
