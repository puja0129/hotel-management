<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['group' => 'contact', 'key' => 'contact_address', 'value' => '123 Luxury Lane, Ahmedabad'],
            ['group' => 'contact', 'key' => 'contact_phone', 'value' => '+91 79 1234 5678'],
            ['group' => 'contact', 'key' => 'contact_email', 'value' => 'info@grandhotel.com'],
            ['group' => 'social', 'key' => 'social_twitter', 'value' => ''],
            ['group' => 'social', 'key' => 'social_facebook', 'value' => ''],
            ['group' => 'social', 'key' => 'social_youtube', 'value' => ''],
            ['group' => 'social', 'key' => 'social_linkedin', 'value' => ''],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(
                ['key' => $s['key']],
                $s
            );
        }
    }
}

