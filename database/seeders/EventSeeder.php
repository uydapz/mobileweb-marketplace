<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            $startDate = $faker->dateTimeBetween('+1 days', '+1 month');
            $endDate   = (clone $startDate)->modify('+' . rand(1, 5) . ' days');

            DB::table('events')->insert([
                'title' => 'Event Batik ' . $faker->city,
                'description' => $faker->paragraph(),
                'start_date' => $startDate,
                'end_date' => $endDate,
                'location' => $faker->city . ', Indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
