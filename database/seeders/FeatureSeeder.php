<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::factory()->count(1)->create([
            'title' => 'Events Place',
            'image' => 'althea6.jpg',
            'description' => 'Our professional event planning team is committed to turning your vision into reality. From initial concept discussions to the day of the event, we work closely with you to understand your goals and preferences. Whether its menu selection, decor choices, or logistical planning, our experts are here to guide you at every step. We invite you to turn your special occasions into extraordinary memories in a setting that reflects sophistication, charm, and a commitment to excellence.',
        ]);

        Feature::factory()->count(1)->create([
            'title' => 'Nature',
            'image' => 'althea11.jpg',
            'description' => 'Escape the stresses of daily life and immerse yourself in a world of pure relaxation at our resorts exquisite swimming pool. Nestled within a lush oasis, our pool is a haven designed for those seeking a serene escape and a chance to unwind in blissful tranquility. Surrounded by swaying palm trees and verdant greenery, the pool area exudes a tranquil atmosphere, inviting you to leave the hustle behind.',
        ]);

        Feature::factory()->count(1)->create([
            'title' => 'Swimming Pool',
            'image' => 'althea18.jpg',
            'description' => 'Surrounded by palm trees and tropical foliage, our pool area exudes a serene ambiance that transports you to a paradise of tranquility. Lounge on comfortable poolside chairs, sip on a refreshing drink, and let the gentle sounds of nature create a soothing backdrop. Our swimming pool is designed with families in mind, providing a safe and enjoyable space for guests of all ages. Children can splash around in the dedicated shallow area, while adults unwind in the deeper sections of the pool.',
        ]);

        Feature::factory()->count(1)->create([
            'title' => 'Wedding',
            'image' => 'althea1.jpg',
            'description' => 'Discover the perfect venue for your dream wedding at Althea Orchard. Our dedicated wedding space is designed to create magical moments against a backdrop of natural beauty. With picturesque surroundings and customizable settings, your special day becomes uniquely yours. Our team is committed to ensuring every detail is impeccable, from exquisite decor to personalized service. Choose Althea Orchard for an enchanting wedding venue where dreams come true.',
        ]);
        
    }
}
