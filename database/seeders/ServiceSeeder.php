<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name'       => 'Rooms & Apartments',
                'slug'       => 'rooms',
                'tag'        => 'Luxury Accommodation',
                'tagline'    => 'Luxurious rooms and apartments with world-class amenities and breathtaking views for every type of traveler — from solo adventurers to families and business guests.',
                'hero_image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=1200&q=85',
                'card_image' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=600&q=80',
                'sort_order' => 1,
                'sections'   => [
                    ['title' => 'Room Types',      'items' => ['Deluxe Room', 'Premium Suite', 'Family Apartment', 'Presidential Suite', 'Studio Room']],
                    ['title' => 'Amenities',        'items' => ['King/Queen Beds', 'Smart TV & WiFi', 'Mini Bar & Fridge', 'Air Conditioning', 'Room Service 24/7']],
                    ['title' => 'Views Available',  'items' => ['Ocean View', 'City Skyline', 'Garden View', 'Pool View']],
                    ['title' => 'Policies',         'items' => ['Check-in: 2:00 PM', 'Check-out: 11:00 AM', 'Pet Friendly Rooms', 'Non-smoking Floors']],
                ],
                'galleries' => [
                    ['url' => 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600&q=80', 'caption' => 'Deluxe Room'],
                    ['url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=600&q=80', 'caption' => 'Premium Suite'],
                    ['url' => 'https://images.unsplash.com/photo-1560185007-cde436f6a4d0?w=600&q=80', 'caption' => 'Luxury Bathroom'],
                    ['url' => 'https://images.unsplash.com/photo-1564078516393-cf04bd966897?w=600&q=80', 'caption' => 'City View'],
                    ['url' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600&q=80', 'caption' => 'Family Room'],
                    ['url' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?w=600&q=80', 'caption' => 'Studio Apartment'],
                ],
                'timings' => [
                    ['label' => 'Check-in',     'value' => '2:00 PM'],
                    ['label' => 'Check-out',    'value' => '11:00 AM'],
                    ['label' => 'Room Service', 'value' => '24/7'],
                    ['label' => 'From',         'value' => '₹4,999/night'],
                ],
                'highlights' => ['Free WiFi', 'Breakfast Included', 'Daily Housekeeping', 'Concierge Service', 'Airport Transfer', 'Late Checkout Available'],
                'footer'     => ['text' => 'Book your perfect room today and enjoy exclusive member discounts.', 'price' => 'Starting ₹4,999/night', 'cta_label' => 'Book Now', 'cta_url' => '/book'],
            ],
            [
                'name'       => 'Food & Restaurant',
                'slug'       => 'food',
                'tag'        => 'Award-Winning Dining',
                'tagline'    => 'Savor award-winning cuisine at our in-house restaurant featuring international and local dishes prepared by top chefs with the finest ingredients sourced daily.',
                'hero_image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1200&q=85',
                'card_image' => 'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80',
                'sort_order' => 2,
                'sections'   => [
                    ['title' => 'Cuisines',        'items' => ['North Indian', 'Continental', 'Chinese', 'Mediterranean', 'Mughlai']],
                    ['title' => 'Dining Options',  'items' => ['All-Day Dining', 'Rooftop Restaurant', 'Poolside Café', 'Private Dining', 'Buffet Breakfast']],
                    ['title' => 'Specialties',     'items' => ['Live Grills', "Chef's Table", 'Sunday Brunch', 'Seasonal Menu']],
                    ['title' => 'Beverages',       'items' => ['Mocktails & Juices', 'Signature Cocktails', 'Premium Wines', 'Coffee & Tea Bar']],
                ],
                'galleries' => [
                    ['url' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&q=80', 'caption' => 'Chef Specials'],
                    ['url' => 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&q=80', 'caption' => 'Restaurant Interior'],
                    ['url' => 'https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=600&q=80', 'caption' => 'Fresh Ingredients'],
                    ['url' => 'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600&q=80', 'caption' => 'Gourmet Dishes'],
                    ['url' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=600&q=80', 'caption' => 'Pizza Station'],
                    ['url' => 'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?w=600&q=80', 'caption' => 'Breakfast Spread'],
                ],
                'timings' => [
                    ['label' => 'Breakfast', 'value' => '7–11 AM'],
                    ['label' => 'Lunch',     'value' => '12–3 PM'],
                    ['label' => 'Dinner',    'value' => '7–11 PM'],
                    ['label' => 'Avg. Cost', 'value' => '₹800/person'],
                ],
                'highlights' => ['Vegetarian Options', 'Jain Menu Available', 'Live Music Fridays', "Chef's Special Daily", 'Outdoor Seating', 'Private Dining Room'],
                'footer'     => ['text' => 'Reserve your table and enjoy a complimentary dessert on us.', 'price' => 'Avg ₹800/person', 'cta_label' => 'Reserve Table', 'cta_url' => '/reserve'],
            ],
            [
                'name'       => 'Spa & Fitness',
                'slug'       => 'spa',
                'tag'        => 'Premium Wellness',
                'tagline'    => 'Rejuvenate body and mind at our premium spa with massage therapies, facial treatments, and a fully equipped fitness center run by certified wellness experts.',
                'hero_image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=1200&q=85',
                'card_image' => 'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=600&q=80',
                'sort_order' => 3,
                'sections'   => [
                    ['title' => 'Spa Therapies',    'items' => ['Swedish Massage', 'Deep Tissue Massage', 'Hot Stone Therapy', 'Aromatherapy', "Couple's Spa"]],
                    ['title' => 'Facial Treatments', 'items' => ['Anti-Aging Facial', 'Hydration Therapy', 'Gold Facial', 'Skin Brightening']],
                    ['title' => 'Fitness Center',   'items' => ['Cardio Machines', 'Free Weights', 'Personal Trainer', 'Sauna & Steam']],
                    ['title' => 'Wellness Packages', 'items' => ['Day Spa Package', 'Weekend Retreat', 'Bridal Package', 'Detox Programme']],
                ],
                'galleries' => [
                    ['url' => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?w=600&q=80', 'caption' => 'Spa Room'],
                    ['url' => 'https://images.unsplash.com/photo-1519823551278-64ac92734fb1?w=600&q=80', 'caption' => 'Massage Therapy'],
                    ['url' => 'https://images.unsplash.com/photo-1600334129128-685c5582fd35?w=600&q=80', 'caption' => 'Facial Treatment'],
                    ['url' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600&q=80', 'caption' => 'Relaxation Pool'],
                    ['url' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=600&q=80', 'caption' => 'Hot Stone'],
                    ['url' => 'https://images.unsplash.com/photo-1491555103944-7c647fd857e6?w=600&q=80', 'caption' => 'Steam Room'],
                ],
                'timings' => [
                    ['label' => 'Spa Hours', 'value' => '6 AM–10 PM'],
                    ['label' => 'Session',   'value' => '60–120 min'],
                    ['label' => 'Gym',       'value' => '24/7'],
                    ['label' => 'From',      'value' => '₹1,500'],
                ],
                'highlights' => ['Organic Products Used', 'Private Treatment Rooms', 'Steam & Sauna', 'Qualified Therapists', 'Pre-booking Required', 'Couple Packages'],
                'footer'     => ['text' => 'Book a spa session and unwind with our signature therapies.', 'price' => 'From ₹1,500/session', 'cta_label' => 'Book Session', 'cta_url' => '/spa-booking'],
            ],
            [
                'name'       => 'Sports & Gaming',
                'slug'       => 'sports',
                'tag'        => 'Recreation & Fun',
                'tagline'    => 'Enjoy a wide range of sports facilities including tennis, basketball, swimming pool, and an indoor gaming zone — perfect for guests of all ages.',
                'hero_image' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1200&q=85',
                'card_image' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=600&q=80',
                'sort_order' => 4,
                'sections'   => [
                    ['title' => 'Outdoor Sports',  'items' => ['Tennis Court', 'Basketball Court', 'Badminton', 'Cricket Net', 'Jogging Track']],
                    ['title' => 'Water Activities', 'items' => ['Swimming Pool', 'Kids Pool', 'Aqua Aerobics', 'Pool Volleyball']],
                    ['title' => 'Indoor Gaming',   'items' => ['Billiards/Snooker', 'Table Tennis', 'Foosball', 'Video Gaming Zone']],
                    ['title' => 'Equipment',       'items' => ['Sports Gear Available', 'Coaching on Request', 'Tournament Events', 'Sports Shop']],
                ],
                'galleries' => [
                    ['url' => 'https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=600&q=80', 'caption' => 'Swimming Pool'],
                    ['url' => 'https://images.unsplash.com/photo-1622279457486-62dcc4a431d6?w=600&q=80', 'caption' => 'Tennis Court'],
                    ['url' => 'https://images.unsplash.com/photo-1603988363607-e1e4a66962c6?w=600&q=80', 'caption' => 'Basketball'],
                    ['url' => 'https://images.unsplash.com/photo-1547347298-4074fc3086f0?w=600&q=80', 'caption' => 'Badminton'],
                    ['url' => 'https://images.unsplash.com/photo-1529900748604-07564a03e7a6?w=600&q=80', 'caption' => 'Kids Pool'],
                    ['url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80', 'caption' => 'Gaming Zone'],
                ],
                'timings' => [
                    ['label' => 'Pool',        'value' => '6 AM–9 PM'],
                    ['label' => 'Courts',      'value' => '6 AM–10 PM'],
                    ['label' => 'Gaming Zone', 'value' => '10 AM–11 PM'],
                    ['label' => 'Access',      'value' => 'Free for guests'],
                ],
                'highlights' => ['Free for Hotel Guests', 'Equipment on Loan', 'Kids Play Area', 'Coaching Available', 'Night-lit Courts', 'Tournaments Monthly'],
                'footer'     => ['text' => 'All sports facilities are complimentary for hotel guests.', 'price' => 'Free for guests', 'cta_label' => 'Enquire Now', 'cta_url' => '/contact'],
            ],
            [
                'name'       => 'Events & Parties',
                'slug'       => 'events',
                'tag'        => 'Celebrations & Conferences',
                'tagline'    => 'Host unforgettable events, weddings, and corporate meetings in our versatile banquet halls and event spaces equipped with state-of-the-art AV and décor support.',
                'hero_image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=1200&q=85',
                'card_image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=600&q=80',
                'sort_order' => 5,
                'sections'   => [
                    ['title' => 'Event Types',       'items' => ['Weddings & Receptions', 'Corporate Meetings', 'Birthday Parties', 'Anniversaries', 'Product Launches']],
                    ['title' => 'Venues',             'items' => ['Grand Ballroom (500 pax)', 'Conference Hall (100 pax)', 'Rooftop Terrace', 'Garden Lawn', 'Board Room (20 pax)']],
                    ['title' => 'Catering Options',  'items' => ['Customized Menu', 'Live Counters', 'Dessert Stations', 'Cocktail Packages']],
                    ['title' => 'Add-ons',            'items' => ['Décor & Florals', 'DJ & Sound Setup', 'Photography', 'AV Equipment', 'Event Planner']],
                ],
                'galleries' => [
                    ['url' => 'https://images.unsplash.com/photo-1519167758481-83f550bb49b3?w=600&q=80', 'caption' => 'Grand Ballroom'],
                    ['url' => 'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=600&q=80', 'caption' => 'Wedding Setup'],
                    ['url' => 'https://images.unsplash.com/photo-1525268323446-0505b6fe7778?w=600&q=80', 'caption' => 'Corporate Event'],
                    ['url' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?w=600&q=80', 'caption' => 'Conference Hall'],
                    ['url' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&q=80', 'caption' => 'Gala Dinner'],
                    ['url' => 'https://images.unsplash.com/photo-1478147427282-58a87a433b2e?w=600&q=80', 'caption' => 'Birthday Party'],
                ],
                'timings' => [
                    ['label' => 'Enquiry',      'value' => '9 AM–6 PM'],
                    ['label' => 'Capacity',     'value' => 'Up to 500'],
                    ['label' => 'Advance Book', 'value' => '2–4 weeks'],
                    ['label' => 'From',         'value' => '₹50,000'],
                ],
                'highlights' => ['In-house Event Planner', 'Custom Décor', 'Catering Packages', 'Valet Parking', 'Bridal Suite', 'Live Entertainment'],
                'footer'     => ['text' => 'Let us make your special occasion truly unforgettable.', 'price' => 'From ₹50,000', 'cta_label' => 'Get a Quote', 'cta_url' => '/event-enquiry'],
            ],
            [
                'name'       => 'GYM & Yoga',
                'slug'       => 'gym',
                'tag'        => 'Health & Wellness',
                'tagline'    => 'Stay fit with our modern gym and yoga sessions led by certified instructors. Open 24/7 for all hotel guests with premium equipment and personalised training plans.',
                'hero_image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=85',
                'card_image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=600&q=80',
                'sort_order' => 6,
                'sections'   => [
                    ['title' => 'Gym Equipment', 'items' => ['Treadmills & Cycles', 'Cross Trainers', 'Free Weights (up to 50kg)', 'Cable Machines', 'Smith Machine']],
                    ['title' => 'Yoga Classes',  'items' => ['Hatha Yoga', 'Power Yoga', 'Meditation Sessions', 'Breathing & Pranayama', 'Prenatal Yoga']],
                    ['title' => 'Trainers',      'items' => ['Personal Training', 'Nutritional Advice', 'Body Assessment', 'Custom Workout Plan']],
                    ['title' => 'Facilities',    'items' => ['Steam Room', 'Changing Rooms', 'Towel Service', 'Protein Bar Counter']],
                ],
                'galleries' => [
                    ['url' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=600&q=80', 'caption' => 'Gym Floor'],
                    ['url' => 'https://images.unsplash.com/photo-1599058945522-28d584b6f0ff?w=600&q=80', 'caption' => 'Free Weights'],
                    ['url' => 'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=600&q=80', 'caption' => 'Yoga Studio'],
                    ['url' => 'https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?w=600&q=80', 'caption' => 'Cardio Zone'],
                    ['url' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=600&q=80', 'caption' => 'Yoga Stretch'],
                    ['url' => 'https://images.unsplash.com/photo-1548690312-e3b507d8c110?w=600&q=80', 'caption' => 'Personal Training'],
                ],
                'timings' => [
                    ['label' => 'Gym',         'value' => 'Open 24/7'],
                    ['label' => 'Yoga Batch 1', 'value' => '6–7 AM'],
                    ['label' => 'Yoga Batch 2', 'value' => '6–7 PM'],
                    ['label' => 'Access',       'value' => 'Free for guests'],
                ],
                'highlights' => ['Open 24/7', 'Certified Trainers', 'Free for Guests', 'Yoga Mats Provided', 'Protein Bar', 'Body Composition Analysis'],
                'footer'     => ['text' => 'Start your fitness journey with a complimentary trainer session.', 'price' => 'Free for hotel guests', 'cta_label' => 'Book a Trainer', 'cta_url' => '/gym-booking'],
            ],
        ];

        foreach ($services as $order => $data) {
            // Insert main service
            $serviceId = DB::table('services')->insertGetId([
                'name'       => $data['name'],
                'slug'       => $data['slug'],
                'tag'        => $data['tag'],
                'tagline'    => $data['tagline'],
                'hero_image' => $data['hero_image'],
                'card_image' => $data['card_image'],
                'is_active'  => true,
                'sort_order' => $data['sort_order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Sections
            foreach ($data['sections'] as $i => $section) {
                DB::table('service_sections')->insert([
                    'service_id'  => $serviceId,
                    'title'       => $section['title'],
                    'items'       => json_encode($section['items']),
                    'sort_order'  => $i,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }

            // Galleries
            foreach ($data['galleries'] as $i => $gallery) {
                DB::table('service_galleries')->insert([
                    'service_id'  => $serviceId,
                    'image_url'   => $gallery['url'],
                    'caption'     => $gallery['caption'] ?? null,
                    'sort_order'  => $i,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }

            // Timings
            foreach ($data['timings'] as $i => $timing) {
                DB::table('service_timings')->insert([
                    'service_id'  => $serviceId,
                    'label'       => $timing['label'],
                    'value'       => $timing['value'],
                    'sort_order'  => $i,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }

            // Highlights
            foreach ($data['highlights'] as $i => $highlight) {
                DB::table('service_highlights')->insert([
                    'service_id'  => $serviceId,
                    'highlight'   => $highlight,
                    'sort_order'  => $i,
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }

            // Footer
            DB::table('service_footers')->insert([
                'service_id'  => $serviceId,
                'text'        => $data['footer']['text'],
                'price'       => $data['footer']['price'],
                'cta_label'   => $data['footer']['cta_label'],
                'cta_url'     => $data['footer']['cta_url'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
