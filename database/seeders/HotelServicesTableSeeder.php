<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HotelService;

class HotelServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['icon' => 'fa-hotel',       'title' => 'Rooms & Apartments',  'short_description' => 'Luxurious rooms and apartments with world-class amenities and breathtaking views for every type of traveler.'],
            ['icon' => 'fa-utensils',    'title' => 'Food & Restaurant',   'short_description' => 'Savor award-winning cuisine at our in-house restaurant featuring international and local dishes prepared by top chefs.'],
            ['icon' => 'fa-dumbbell',    'title' => 'GYM & Yoga',          'short_description' => 'Stay fit with our modern gym and yoga sessions led by certified instructors. Open 24/7 for hotel guests.'],
            ['icon' => 'fa-swimming-pool', 'title' => 'Sports & Gaming',     'short_description' => 'Enjoy a wide range of sports facilities including tennis, basketball, swimming pool, and an indoor gaming zone.'],
            ['icon' => 'fa-glass-cheers','title' => 'Events & Parties',    'short_description' => 'Host unforgettable events, weddings, and corporate meetings in our versatile banquet halls and event spaces.'],
            ['icon' => 'fa-spa',         'title' => 'Spa & Fitness',       'short_description' => 'Rejuvenate body and mind at our premium spa with massage therapies, facial treatments, and a fully equipped fitness center.'],
        ];

        foreach ($services as $service) {
            HotelService::create($service);
        }
    }
}
