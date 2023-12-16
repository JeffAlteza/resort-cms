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
        AboutUs::insert(
            [
                [
                    'title' => 'About Us',
                    'image' => 'althea27.jpg',
                    'description' => 'Welcome to Altheas Orchard, where our passion for creating exceptional moments meets 
            the epitome of luxury in resorts and event spaces. With an unwavering commitment to excellence, 
            we take pride in curating unparalleled experiences that transcend the ordinary. Nestled in 
            breathtaking locales, our resorts are designed to be sanctuaries of opulence, providing a 
            harmonious blend of indulgence and relaxation. Our event spaces, infused with sophistication 
            and versatility, serve as the canvas for your most cherished celebrations.',
                    'type' => 'about us',
                    'date' => '2020-01-01'
                ],
                [
                    'title' => 'Planned Construction',
                    'image' => '',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. veniam libero facilis minus reprehenderit',
                    'type' => 'timeline',
                    'date' => '2020-01-01'
                ],
                [
                    'title' => 'Construction',
                    'image' => '',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. veniam libero facilis minus reprehenderit',
                    'type' => 'timeline',
                    'date' => '2022-03-01'
                ],
                [
                    'title' => 'Company Started',
                    'image' => '',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. veniam libero facilis minus reprehenderit',
                    'type' => 'timeline',
                    'date' => '2023-04-01'
                ],
                [
                    'title' => 'Website Launch',
                    'image' => '',
                    'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. veniam libero facilis minus reprehenderit',
                    'type' => 'timeline',
                    'date' => '2024-01-01'
                ]
            ]
        );
    }
}
