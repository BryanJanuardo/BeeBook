<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuestTracker;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestTrackerController extends Controller
{
    const TotalPageQuest = 20;
    const timeZone = 'UTC';

    private static function createNewQuest($userID) {
        $TimeZone = new \DateTimeZone(self::timeZone);

        $completedDate = new \DateTime(now(), $TimeZone);
        $completedDate->modify('-1 day');
        $questTracker = QuestTracker::create([
            'QuestAvailable' => true,
            'UserID' => $userID,
            'QuestProgress' => 0,
            'QuestCompletedDate' => $completedDate->format('Y-m-d H:i:s')
        ]);
        return $questTracker;
    }

    private static function resetQuestAvailability($questTracker){
        $TimeZone = new \DateTimeZone(self::timeZone);

        $latestQuestCompletedDate = new \DateTime($questTracker->QuestCompletedDate, $TimeZone);
        $latestQuestCompletedDate->modify('+1 day');
        $now = new \DateTime(now(), $TimeZone);

        if($latestQuestCompletedDate < $now && $questTracker->QuestAvailable == false){
            $questTracker->update([
                'QuestAvailable' => true,
                'QuestProgress' => 0,
            ]);
        }
    }

    public static function updateQuest($userID) {
        $questTracker = QuestTracker::where('UserID', $userID)->first();

        if($questTracker == null){
            $questTracker = self::createNewQuest($userID);
        }

        self::resetQuestAvailability($questTracker);

        if($questTracker->QuestProgress == self::TotalPageQuest){
            $user = User::where('id', $userID)->first();
            $user->update([
                'BookRedemptionPoints' => $user->BookRedemptionPoints + 20
            ]);

            $questTracker->update([
                'QuestAvailable' => false,
                'QuestCompletedDate' => now(),
            ]);
        }

        $questTracker->update([
            'QuestProgress' => $questTracker->QuestProgress + 1,
        ]);
    }
}
