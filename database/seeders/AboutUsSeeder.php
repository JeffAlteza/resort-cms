<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutUs::create([
            'title' => 'About Us',
            'image' => 'martina21.jpg',
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
