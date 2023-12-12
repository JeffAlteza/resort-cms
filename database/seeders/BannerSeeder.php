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
                'title' => 'Martina',
                'image' => 'martina11.jpg',
                'type' => 'home',
                'description' => 'Escape · Reconnect · Thrive · Your Nature Oasis Awaits',
            ],
            [
                'title' => 'Gallery',
                'image' => 'martina10.jpg',
                'type' => 'gallery',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
            [
                'title' => 'Feature',
                'image' => 'martina10.jpg',
                'type' => 'feature',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
            [
                'title' => 'About Us',
                'image' => 'martina10.jpg',
                'type' => 'about us',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
            [
                'title' => 'Contacts',
                'image' => 'martina10.jpg',
                'type' => 'contact',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
            [
                'title' => 'Booking Form',
                'image' => 'martina10.jpg',
                'type' => 'book',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
            ],
        ]);
    }
}
