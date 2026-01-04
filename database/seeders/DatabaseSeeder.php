<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FeaturedDesignSeeder::class,
            UserSeeder::class,
            StorySeeder::class,
            ArticleSeeder::class,
            EventSeeder::class,
            CategoryCollectionSeeder::class,
            CollectionSeeder::class,
            FaqSeeder::class,
            PartnershipSeeder::class,
            TutorialSeeder::class,
            SupportSeeder::class,
            DocumentationSeeder::class,
            TestimoniSeeder::class,
            BannerSeeder::class,
            VoteSeeder::class,
            // MartSeeder::class,
        ]);
    }

}
