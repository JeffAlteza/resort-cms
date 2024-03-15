<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            ['title' => 'Cellphone', 'description' => '(123) 456-7890'],
            ['title' => 'Telephone', 'description' => '(123) 456-7890'],
            ['title' => 'Email', 'description' => 'sampleemail@gmail.com'],
            ['title' => 'Location', 'description' => 'Batangas City, Philippines'],
            ['title' => 'Facebook', 'description' => 'https://www.facebook.com'],
            ['title' => 'Instagram', 'description' => 'https://www.instagram.com'],
            ['title' => 'Youtube', 'description' => 'https://www.youtube.com'],
        ];

        foreach ($contacts as $contact) {
            Contact::create([
                'title' => $contact['title'],
                'description' => $contact['description'],
                'type' => in_array($contact['title'], ['Facebook', 'Instagram', 'Youtube']) ? 'social media' : 'contact',
                'visibility' => true,
            ]);
        }
    }
}
