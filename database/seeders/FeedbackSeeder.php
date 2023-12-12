<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::insert([
            [
                'name' => 'John Doe',
                'address' => 'Makati City, Philippines',
                'occupation' => 'Manager',
                'feedback' => 'Keep on jumping to get the most of the jump rope exercise. It will help you to increase your bone density as well',
                'image' => 'martina11.jpg',
            ],
            [
                'name' => 'John Doe',
                'address' => 'Makati City, Philippines',
                'occupation' => 'Manager',
                'feedback' => 'Keep on jumping to get the most of the jump rope exercise. It will help you to increase your bone density as well',
                'image' => 'martina11.jpg',
            ],
            [
                'name' => 'John Doe',
                'address' => 'Makati City, Philippines',
                'occupation' => 'Manager',
                'feedback' => 'Keep on jumping to get the most of the jump rope exercise. It will help you to increase your bone density as well',
                'image' => 'martina11.jpg',
            ],
        ]);
    }
}
