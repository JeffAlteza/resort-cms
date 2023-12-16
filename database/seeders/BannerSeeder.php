<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::insert([
            [
                'title' => 'Althea`s Orchard',
                'image' => 'althea31.jpg',
                'type' => 'home',
                'description' => 'Private Resort and Events Place',
            ],
            [
                'title' => 'Gallery',
                'image' => 'althea25.jpg',
                'type' => 'gallery',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
            [
                'title' => 'Feature',
                'image' => 'althea16.jpg',
                'type' => 'feature',
                'description' => 'Explore the essence of relaxation and indulgence that makes your stay truly memorable.',
            ],
            [
                'title' => 'About Us',
                'image' => 'althea7.jpg',
                'type' => 'about us',
                'description' => ' Learn about our journey, values, and commitment to creating memorable moments for our guests.',
            ],
            [
                'title' => 'Contacts',
                'image' => 'althea1.jpg',
                'type' => 'contact',
                'description' => 'Whether you have questions, feedback, or want to plan your stay, our contact page is your direct link to our team.',
            ],
            [
                'title' => 'Booking Form',
                'image' => 'althea1.jpg',
                'type' => 'book',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
        ]);
    }
}
