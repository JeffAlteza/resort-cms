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
        Home::factory()->count(1)->create(
            [
                'title' => 'Martina',
                'image' => 'martina11.jpg',
                'type' => 'home banner'
            ]
        );
        Home::factory()->count(1)->create(
            [
                'title' => 'Gallery',
                'description' => 'Our gallery provides a glimpse into the diverse experiences that our resort caters to.',
                'image' => 'martina10.jpg',
                'type' => 'gallery banner'
            ]
        );
        Home::factory()->count(1)->create([
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

        Home::factory()->count(1)->create([
            'title' => 'Events Place',
            'image' => 'martina25.jpg',
            'description' => 'Our professional event planning team is committed to turning your vision into reality. From initial concept discussions to the day of the event, we work closely with you to understand your goals and preferences. Whether its menu selection, decor choices, or logistical planning, our experts are here to guide you at every step. We invite you to turn your special occasions into extraordinary memories in a setting that reflects sophistication, charm, and a commitment to excellence.',
            'type' => 'feature'
        ]);

        Home::factory()->count(1)->create([
            'title' => 'Nature',
            'image' => 'martina5.jpg',
            'description' => 'Escape the stresses of daily life and immerse yourself in a world of pure relaxation at our resorts exquisite swimming pool. Nestled within a lush oasis, our pool is a haven designed for those seeking a serene escape and a chance to unwind in blissful tranquility. Surrounded by swaying palm trees and verdant greenery, the pool area exudes a tranquil atmosphere, inviting you to leave the hustle behind.',
            'type' => 'feature'
        ]);

        Home::factory()->count(1)->create([
            'title' => 'Swimming Pool',
            'image' => 'martina28.jpg',
            'description' => 'Surrounded by palm trees and tropical foliage, our pool area exudes a serene ambiance that transports you to a paradise of tranquility. Lounge on comfortable poolside chairs, sip on a refreshing drink, and let the gentle sounds of nature create a soothing backdrop. Our swimming pool is designed with families in mind, providing a safe and enjoyable space for guests of all ages. Children can splash around in the dedicated shallow area, while adults unwind in the deeper sections of the pool.',
            'type' => 'feature'
        ]);
    }
}
