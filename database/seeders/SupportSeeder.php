<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('supports')->insert([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraphs(2, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
