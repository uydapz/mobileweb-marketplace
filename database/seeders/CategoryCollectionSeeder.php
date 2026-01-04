<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryCollectionSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Batik Modern',
            'Batik Tradisional',
            'Batik Kontemporer',
            'Batik Eksklusif',
            'Batik Custom',
        ];

        foreach ($categories as $category) {
            DB::table('category_collections')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
