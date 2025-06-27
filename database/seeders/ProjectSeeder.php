<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Pekan IT Minigames',
                'author' => 'Adly Fahreza & Gheraldy Moses Tarigan',
                'division' => 'Web',
            ],
            [
                'name' => 'Plus PNB Game',
                'author' => 'Muhammad Rizki Pratama',
                'division' => 'Game',
            ],
            [
                'name' => 'Fox Parkour Multiplayer',
                'author' => 'Ahmad Zidan Ikhsan & M.Fauzan',
                'division' => 'Game',
            ],
            [
                'name' => 'Preneur Digital Stamp',
                'author' => 'Adly Fahreza & Gheraldy Moses Tarigan',
                'division' => 'Web',
            ],
            [
                'name' => 'AR Planet',
                'author' => 'Dimas Purnomo',
                'division' => 'Game',
            ],
            [
                'name' => 'Weather Web',
                'author' => 'Alvin Rizky',
                'division' => 'Web',
            ],
            [
                'name' => 'Basic Web Search',
                'author' => 'M. Luthfi Malik',
                'division' => 'Web',
            ],
            [
                'name' => 'Dark And Magic',
                'author' => 'Dimas Purnomo & Satria Raja Djuanda',
                'division' => 'Game',
            ],
            [
                'name' => 'Indonesia Drive Simulator',
                'author' => 'Muhammad Rizki Pratama & Muhammad Azkaril Delfiera',
                'division' => 'Game',
            ],
            [
                'name' => 'Cipher - Pekan IT Event Assistant',
                'author' => 'Ihsan Wardhana, Muhammad Affan, Rynaldi Varel, Faza Angga',
                'division' => 'Web',
            ],
            [
                'name' => 'Habitsez',
                'author' => 'Gheraldy Moses Tarigan & John Obama',
                'division' => 'Mobile',
            ],
            [
                'name' => 'Web SPMB Penus',
                'author' => 'Ahmad Zidan Al Ikhsan',
                'division' => 'Web',
            ],
        ];

        foreach ($projects as $project) {
            DB::table('leaderboards')->insert([
                'project_id' => uniqid('project_'),
                'name'       => $project['name'],
                'author'     => $project['author'],
                'division'   => $project['division'],
            ]);
        }
    }
}
