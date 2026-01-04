<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeaturedDesignSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('featured_designs')->insert([
                'theme' => 'Featured Design' . Str::random(5),
                'description' => 'This featured design highlights the artistic values of collection.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
