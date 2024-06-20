<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'RoleId' => '1',
            'Role' => 'User',
        ]);

        Role::create([
            'RoleId' => '2',
            'Role' => 'Admin',
        ]);
    }
}
