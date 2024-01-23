<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            UserSeeder::class,
            // HomeSeeder::class,
            ContactSeeder::class,
            GallerySeeder::class,
            FeatureSeeder::class,
            BannerSeeder::class,
            AboutUsSeeder::class,
            FeedbackSeeder::class,
            FaqSeeder::class
        ]);
    }
}
