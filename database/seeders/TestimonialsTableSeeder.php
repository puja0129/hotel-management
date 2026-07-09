<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Arjun Mehta',
                'profession' => 'Business Traveller',
                'image' => 'img/testimonial-1.jpg',
                'comment' => 'An absolutely stunning hotel. The service was impeccable, the rooms were spotless, and the food was extraordinary.',
                'is_active' => true,
            ],
            [
                'client_name' => 'Priya Sharma',
                'profession' => 'Guest',
                'image' => 'img/testimonial-2.jpg',
                'comment' => 'Grand Hotel exceeded all my expectations. The staff was incredibly attentive and the overall experience was truly five-star.',
                'is_active' => true,
            ],
            [
                'client_name' => 'Rohan Patel',
                'profession' => 'Couple Stay',
                'image' => 'img/testimonial-3.jpg',
                'comment' => 'Perfect for our anniversary trip. Every little detail was taken care of with warmth and professionalism.',
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(
                ['client_name' => $t['client_name']],
                $t
            );
        }
    }
}

