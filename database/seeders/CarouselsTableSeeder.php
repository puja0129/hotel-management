<?php

namespace Database\Seeders;

use App\Models\Carousel;
use Illuminate\Database\Seeder;

class CarouselsTableSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Discover A Brand Luxurious Hotel',
                'subtitle' => 'Luxury Living',
                'image' => 'img/carousel-1.jpg',
                'button1_text' => 'Explore Rooms',
                'button1_link' => '/rooms',
                'button2_text' => 'Book A Room',
                'button2_link' => '/booking',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Your Perfect Getaway Awaits',
                'subtitle' => 'Premium Experience',
                'image' => 'img/carousel-2.jpg',
                'button1_text' => 'Our Services',
                'button1_link' => '/services',
                'button2_text' => 'View Gallery',
                'button2_link' => '/gallery',
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            Carousel::updateOrCreate(
                ['title' => $slide['title']],
                $slide
            );
        }
    }
}

