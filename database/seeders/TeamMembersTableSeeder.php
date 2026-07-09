<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMembersTableSeeder extends Seeder
{
    public function run(): void
    {
        $team = [
            ['name' => 'William James',   'designation' => 'General Manager',      'image' => 'team-1.jpg', 'sort_order' => 1],
            ['name' => 'Victoria Stone',  'designation' => 'Head of Hospitality',  'image' => 'team-2.jpg', 'sort_order' => 2],
            ['name' => 'Alexander Green', 'designation' => 'Executive Chef',        'image' => 'team-3.jpg', 'sort_order' => 3],
            ['name' => 'Sophia Carter',   'designation' => 'Spa Director',          'image' => 'team-4.jpg', 'sort_order' => 4],
        ];

        foreach ($team as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                $member
            );
        }
    }
}
