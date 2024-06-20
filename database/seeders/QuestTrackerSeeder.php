<?php

namespace Database\Seeders;

use App\Models\QuestTracker;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestTrackerSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            QuestTracker::create([
                'UserID' => $user->id,
                'QuestCompletionDate' => null,
                'QuestProgress' => 0,
                'QuestAvailable' => true
            ]);
        }
    }
}
