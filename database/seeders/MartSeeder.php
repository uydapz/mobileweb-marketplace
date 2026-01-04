<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Collection;

class MartSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $collections = Collection::all();

        // Jika belum ada koleksi, hentikan proses
        if ($collections->isEmpty()) {
            $this->command->warn('⚠️ No collections found. Please seed collections first.');
            return;
        }

        foreach ($collections as $collection) {
            // Buat beberapa produk untuk setiap koleksi
            $productCount = rand(1, 3);

            for ($i = 1; $i <= $productCount; $i++) {
                DB::table('marts')->insert([
                    'collection_id' => $collection->id,
                    'product_name' => $collection->name . ' Series ' . $i,
                    'price' => $faker->randomFloat(2, 150000, 1000000),
                    'stock' => $faker->numberBetween(5, 50),
                    'image' => $collection->image ?? 'marts/default.webp',
                    'description' => 'Exclusive item from ' . $collection->name . ' collection — blending heritage and modern design.',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
