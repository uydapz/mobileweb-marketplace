<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $collectionIds = DB::table('collections')->pluck('id')->toArray();
        $userIds = DB::table('users')->pluck('id')->toArray();

        if (empty($collectionIds)) {
            $this->command->warn('⚠️ Tidak ada data di tabel collections. Seeder Vote dilewati.');
            return;
        }

        // Buat 3 event voting
        for ($v = 1; $v <= 3; $v++) {

            // Jika data koleksi terlalu sedikit, skip
            if (count($collectionIds) < 2) {
                $this->command->warn("⚠️ Data koleksi kurang dari 2, event vote #{$v} dilewati.");
                continue;
            }

            $voteId = DB::table('votes')->insertGetId([
                'title'       => "Vote Desain Batik #{$v}",
                'description' => $faker->sentence(10),
                'start_at'    => now()->subDays(rand(1, 10)),
                'end_at'      => now()->addDays(rand(3, 10)),
                'is_active'   => true,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            // Pilih beberapa koleksi acak untuk ikut voting
            $jumlahPeserta = min(count($collectionIds), rand(3, 5));
            $participants = $faker->randomElements($collectionIds, $jumlahPeserta);
            $voteCollectionIds = [];

            foreach ($participants as $collectionId) {
                $voteCollectionIds[] = DB::table('vote_collections')->insertGetId([
                    'vote_id'       => $voteId,
                    'collection_id' => $collectionId,
                    'vote_count'    => rand(0, 50),
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

            // Simulasikan user ikut voting
            if (!empty($userIds) && !empty($voteCollectionIds)) {
                $jumlahUser = min(count($userIds), rand(5, 15)); // aman
                $chosenUsers = $faker->randomElements($userIds, $jumlahUser);

                foreach ($chosenUsers as $userId) {
                    $chosenVoteCollectionId = $faker->randomElement($voteCollectionIds);

                    DB::table('vote_user_logs')->insert([
                        'vote_id'             => $voteId,
                        'user_id'             => $userId,
                        'vote_collection_id'  => $chosenVoteCollectionId,
                        'created_at'          => now(),
                        'updated_at'          => now(),
                    ]);

                    // Tambah hitungan vote
                    DB::table('vote_collections')
                        ->where('id', $chosenVoteCollectionId)
                        ->increment('vote_count');
                }
            }
        }
    }
}
