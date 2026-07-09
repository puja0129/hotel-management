<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            RoomsTableSeeder::class,
            HotelServicesTableSeeder::class,
            TeamMembersTableSeeder::class,
            ServiceSeeder::class,
            CarouselsTableSeeder::class,
            TestimonialsTableSeeder::class,
            SettingsTableSeeder::class,
        ]);
    }
}
