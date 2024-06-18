<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\QuestTracker;
use DateTime;
use Illuminate\Http\Request;

class QuestTrackerController extends Controller
{
    const TotalPageQuest = 20;
    const timeZone = 'UTC';

    private function createNewQuest($userID) {
        $questTracker = QuestTracker::create([
            'QuestAvailable' => true,
            'UserID' => $userID,
            'QuestProgress' => 0,
            'QuestCompletedDate' => null
        ]);
    }

    private function resetQuestAvailability($questTracker){
        $TimeZone = new \DateTimeZone(self::timeZone);

        $latestQuestCompletedDate = new \DateTime($questTracker->QuestCompletedDate, $TimeZone);
        $latestQuestCompletedDate->modify('+1 day');
        $now = new \DateTime(now(), $TimeZone);

        if($latestQuestCompletedDate < $now && $questTracker->QuestAvailable == false){
            $questTracker->update([
                'QuestAvailable' => true,
                'QuestProgress' => 0,
                'QuestCompletedDate' => null
            ]);
            return true;
        }

        return false;
    }

    public static function updateQuest($userID) {
        $questTracker = QuestTracker::where('UserID', $userID)->first();

        if($questTracker == null){
            self::createNewQuest($userID);
            $questTracker = QuestTracker::where('UserID', $userID)->first();
        }

        if(self::resetQuestAvailability($questTracker) == false){
            return;
        }

        if($questTracker->QuestProgress == self::TotalPageQuest){
            $questTracker->update([
                'QuestAvailable' => false,
                'QuestCompletedDate' => now(),
            ]);
        }

        $questTracker->update([
            'QuestProgess' => $questTracker->QuestProgress + 1,
        ]);
    }
}
