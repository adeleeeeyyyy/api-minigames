<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = ['WebDev', 'MobileDev', 'Cysec', 'GameDev'];

        foreach ($divisions as $division) {
            Developer::create([
                'developer_id' => uniqid('developer_'),
                'division' => $division,
                'logo' => 'images/division_logos/' . strtolower($division) . '.png'
            ]);
        }
    }
}
