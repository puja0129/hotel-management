<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('admin@123'),
                'is_admin' => true,
            ]
        );

        // Regular user
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name'     => 'John Doe',
                'password' => Hash::make('user@123'),
                'is_admin' => false,
            ]
        );
    }
}
