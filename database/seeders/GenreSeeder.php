<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::create([
            'id' => 'GE-001',
            'GenreName' => 'Fantasy',
        ]);

        Genre::create([
            'id' => 'GE-002',
            'GenreName' => 'Horror',
        ]);

        Genre::create([
            'id' => 'GE-003',
            'GenreName' => 'Action',
        ]);

        Genre::create([
            'id' => 'GE-004',
            'GenreName' => 'Comedy',
        ]);
    }
}
