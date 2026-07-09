<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomsTableSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'name' => 'Junior Suite',
                'image' => 'room-junior.jpg',
                'price' => 800.00,
                'stars' => 4,
                'bed_count' => 1,
                'bath_count' => 1,
                'wifi' => true,
                'description' => 'A comfortable and elegant junior suite with modern amenities, perfect for solo travelers or couples. Features a king-size bed, flat-screen TV, and a beautiful city view.',
                'is_available' => true,
            ],
            [
                'name' => 'Executive Suite',
                'image' => 'room-executive.jpg',
                'price' => 1200.00,
                'stars' => 5,
                'bed_count' => 2,
                'bath_count' => 1,
                'wifi' => true,
                'description' => 'Our executive suite offers a spacious living area, premium furnishings, and breathtaking views. Ideal for business travelers who demand the best in comfort and style.',
                'is_available' => true,
            ],
            [
                'name' => 'Super Deluxe',
                'image' => 'room-deluxe.jpg',
                'price' => 1800.00,
                'stars' => 5,
                'bed_count' => 2,
                'bath_count' => 2,
                'wifi' => true,
                'description' => 'The Super Deluxe room provides an extraordinary experience with its lavish décor, premium bedding, and state-of-the-art entertainment system. Perfect for a luxurious stay.',
                'is_available' => true,
            ],
            [
                'name' => 'Presidential Suite',
                'image' => 'room-presidential.jpg',
                'price' => 2500.00,
                'stars' => 5,
                'bed_count' => 3,
                'bath_count' => 3,
                'wifi' => true,
                'description' => 'Our flagship Presidential Suite offers unmatched luxury with a private butler service, panoramic views, private dining room, and world-class interior designed by renowned architects.',
                'is_available' => true,
            ],
            [
                'name' => 'Honeymoon Suite',
                'image' => 'room-honeymoon.jpg',
                'price' => 2100.00,
                'stars' => 5,
                'bed_count' => 1,
                'bath_count' => 2,
                'wifi' => true,
                'description' => 'Specially designed for couples, this romantic suite features a jacuzzi bath, private balcony, rose petal turndown service, and complimentary champagne upon arrival.',
                'is_available' => true,
            ],
            [
                'name' => 'Family Room',
                'image' => 'room-family.jpg',
                'price' => 1500.00,
                'stars' => 4,
                'bed_count' => 3,
                'bath_count' => 2,
                'wifi' => true,
                'description' => 'Perfect for families, this spacious room features multiple beds, a kids\' corner, and a comfortable sitting area. Located near the pool and playground for maximum family fun.',
                'is_available' => true,
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
