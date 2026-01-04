<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    public function run()
    {
        DB::table('banners')->insert([
            'video' => 'banner/default.mp4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
