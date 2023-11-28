<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 30; $i++) {
            Gallery::create([
                'title' => 'Gallery Photo',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac orci odio. Ut eu luctus est.',
                'image' => "martina{$i}.jpg",
                'visibility' => true,
            ]);
        }
    }
}
