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
        Home::factory()->count(1)->create([
            'title' => 'About Us',
            'description' => 'Welcome to Martina, where our passion for creating exceptional moments meets 
                              the epitome of luxury in resorts and event spaces. With an unwavering commitment to excellence, 
                              we take pride in curating unparalleled experiences that transcend the ordinary. Nestled in 
                              breathtaking locales, our resorts are designed to be sanctuaries of opulence, providing a 
                              harmonious blend of indulgence and relaxation. Our event spaces, infused with sophistication 
                              and versatility, serve as the canvas for your most cherished celebrations.',
            'type' => 'about us'
        ]);
    }
}
