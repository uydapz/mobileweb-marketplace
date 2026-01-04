<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) { // bisa diganti jumlahnya
            DB::table('faqs')->insert([
                'question' => $faker->sentence(6), // pertanyaan acak
                'answer'   => $faker->paragraph(2), // jawaban acak
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
