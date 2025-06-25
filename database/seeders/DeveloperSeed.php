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
        Developer::create([
            'developer_id' => uniqid('developer_'),
            'division' => 'WebDev',
            'logo' => ''
        ]);
    }
}
