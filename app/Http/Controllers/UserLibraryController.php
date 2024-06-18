<?php

namespace App\Http\Controllers;

use App\Models\UserLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLibraryController extends Controller
{
    public static function getPageByUserId($userID){
        $userLibrary = UserLibrary::where('UserID', $userID)->get();
        if($userLibrary)
            return $userLibrary->ReadProgress;
        else
            return 1;
    }

    public static function updateBookProgress($ISBN, $page){
        $user = Auth::user();

        if($user){
            $existingRecord = UserLibrary::where('ISBN', $ISBN)->where('UserID', $user->userID)->first();
            if($existingRecord != null){
                $existingRecord->update([
                    'ReadProgress' => $page
                ]);
            }
            else{
                UserLibrary::create([
                    'ISBN' => $ISBN,
                    'UserID' => $user->userID,
                    'ReadProgress' => $page
                 ]);
            }
            QuestTrackerController::updateQuest($user->userID);
        }
    }
}
