<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::create([
            'name' => 'Bjan',
            'roleid' => '2',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'BookRedemptionPoints' => 0
        ]);

        User::create([
            'name' => 'FerFeb',
            'roleid' => '1',
            'email' => 'Ferry@gmail.com',
            'password' => Hash::make('123456'),
            'BookRedemptionPoints' => 30
        ]);


        User::create([
            'name' => 'Nibon',
            'roleid' => '1',
            'email' => 'Nibon@gmail.com',
            'password' => Hash::make('123456'),
            'BookRedemptionPoints' => 30
        ]);


        User::create([
            'name' => 'HarleyNoob',
            'roleid' => '1',
            'email' => 'HarleyBau@gmail.com',
            'password' => Hash::make('123456'),
            'BookRedemptionPoints' => 69
        ]);


        User::create([
            'name' => 'Wilson',
            'roleid' => '1',
            'email' => 'WilsonW@gmail.com',
            'password' => Hash::make('123456'),
            'BookRedemptionPoints' => 130
        ]);
    }
}
