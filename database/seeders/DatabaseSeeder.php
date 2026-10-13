<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tour;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

         User::updateOrCreate(['email' => 'admin@bisech.com'],
          [
            'name' => 'Bisech Administrator',
            'email' => 'admin@bisech.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        // Starter experiences for the public website. These are enquiry-led
        // examples, not fixed-price or guaranteed-availability packages.
        $tours = [
            [
                'title' => 'Serengeti Wildlife Safari', 'slug' => 'serengeti-wildlife-safari',
                'image' => 'assets/images/slide/bisech005.jpg',
                'description' => 'Explore Tanzania’s famous open plains and discuss a wildlife safari shaped around your dates and interests.',
                'paragraph' => "A Serengeti safari can be planned around the time you have available, the wildlife areas you hope to visit and your preferred pace of travel. Contact Bisech to discuss possible routes, transport, accommodation preferences and travel dates.\n\nSuggested planning details: preferred dates, number of travellers, trip length and any parks you would like to include. Route, inclusions, availability and price are confirmed individually before booking.",
            ],
            [
                'title' => 'Northern Circuit Safari', 'slug' => 'northern-circuit-safari',
                'image' => 'assets/images/slide/Bisech003.webp',
                'description' => 'Start a conversation about combining northern Tanzania wildlife areas into one journey.',
                'paragraph' => "The Northern Circuit offers different ways to experience Tanzania’s landscapes and wildlife. Tell Bisech which places interest you and how long you plan to travel, and we can discuss a suitable route.\n\nThis is a starting point for an enquiry rather than a fixed itinerary. Park selection, accommodation, transport, availability and pricing need to be agreed for your dates.",
            ],
            [
                'title' => 'Kilimanjaro Climbing Enquiry', 'slug' => 'kilimanjaro-climbing',
                'image' => 'assets/images/slide/Bisech 006.webp',
                'description' => 'Discuss Kilimanjaro route options, timing, group size and preparation for a mountain journey.',
                'paragraph' => "Planning a Kilimanjaro climb starts with choosing an appropriate route and travel period, understanding the physical demands and reviewing the arrangements required for your group. Contact Bisech to discuss your preferred month, group size and hiking experience.\n\nRoute, duration, operator arrangements, inclusions, availability and price must be confirmed before any booking.",
            ],
            [
                'title' => 'Zanzibar Island Escape', 'slug' => 'zanzibar-island-escape',
                'image' => 'assets/images/listing/5.jpg',
                'description' => 'Plan an Indian Ocean break with time for the coast, local culture and a pace that suits you.',
                'paragraph' => "Whether Zanzibar is the main reason for your trip or a coastal break after a safari, share your preferred dates, number of travellers and length of stay with Bisech. We can discuss the type of stay and travel connections you have in mind.\n\nAccommodation, activities, transfers, flight connections, availability and prices are confirmed individually.",
            ],
            [
                'title' => 'Tarangire Day Trip Enquiry', 'slug' => 'tarangire-day-trip',
                'image' => 'assets/images/slide/Bisech010.jpg',
                'description' => 'Ask about a visit to Tarangire and the transport and timing that may suit your plans.',
                'paragraph' => "If you are interested in visiting Tarangire, let Bisech know where you will be starting from, your preferred date and the number of people travelling. We can discuss whether a day trip or a longer itinerary is more suitable for your plans.\n\nTravel time, park arrangements, inclusions, availability and pricing must be confirmed for your specific enquiry.",
            ],
            [
                'title' => 'Safari and Zanzibar Combination', 'slug' => 'safari-and-zanzibar-combination',
                'image' => 'assets/images/Bisech003.webp',
                'description' => 'Explore the idea of combining a Tanzania safari with time on the Zanzibar coast.',
                'paragraph' => "A safari-and-coast trip can bring wildlife viewing and Indian Ocean downtime together in one holiday. Share your travel dates, group size, preferred safari areas and how many nights you would like by the coast.\n\nThe order of travel, transfers, flights, accommodation, availability and price are planned and confirmed individually. No fixed inclusions or rates are implied by this sample listing.",
            ],
        ];

        foreach ($tours as $tour) {
            Tour::updateOrCreate(['slug' => $tour['slug']], $tour);
        }
    }
}
