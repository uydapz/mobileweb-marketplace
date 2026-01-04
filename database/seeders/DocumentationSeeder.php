<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentationSeeder extends Seeder
{
    public function run()
    {
        DB::table('documentations')->insert([
            'title' => 'Panduan Batik NDEXO',
            'file_path' => 'documentation/default.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
