<?php

namespace Database\Seeders;

use App\Models\Home;
use Database\Factories\HomeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Home::factory()->count(1)->create();
        Home::factory()->count(1)->create([
            'title' => 'What are you waiting for?',
            'description' => 'Reserve Now',
            'type' => 'reserve section'
        ]);
        Home::factory()->count(1)->create([
            'title' => 'Unwind',
            'description' => 'Unwind is a tranquil escape, a sanctuary where the rhythms of nature harmonize with the soothing embrace of luxury.',
            'type' => 'feature'
        ]);
    }
}
