<?php

namespace Database\Seeders;

use App\Models\faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What amenities does the resort offer?',
                'answer' => 'Our resort provides a range of amenities, including a swimming pool, spa, fitness center, restaurants, and more.',
            ],
            [
                'question' => 'Are pets allowed at the resort?',
                'answer' => 'Unfortunately, we do not allow pets at our resort to ensure the comfort and safety of all guests.',
            ],
            [
                'question' => 'What types of accommodations are available?',
                'answer' => 'We offer a variety of accommodations, including deluxe rooms, suites, and private villas with scenic views.',
            ],
            [
                'question' => 'What recreational activities are available on-site?',
                'answer' => 'Guests can enjoy a range of activities, such as water sports, guided tours, hiking trails, and organized events.',
            ],
            [
                'question' => 'Is there Wi-Fi available throughout the resort?',
                'answer' => 'Yes, complimentary Wi-Fi is available in all public areas and guest rooms for the convenience of our guests.',
            ],
            [
                'question' => 'What is the cancellation policy for reservations?',
                'answer' => 'Our cancellation policy varies depending on the type of reservation. Please refer to our booking terms or contact our reservations team for details.',
            ],
            [
                'question' => 'Are there any special events or promotions at the resort?',
                'answer' => 'We frequently host special events and promotions. Stay updated by checking our website or contacting our front desk for the latest information.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
