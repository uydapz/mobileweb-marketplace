<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Faker\Factory as Faker;

class TestimoniSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Loop user, kasih testimoni satu per satu
        foreach (User::take(10)->get() as $user) {
            DB::table('testimonis')->insert([
                'user_id'    => $user->id,
                'quote'      => $faker->sentence(12),
                'show'      => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
