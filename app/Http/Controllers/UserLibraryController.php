<?php

namespace App\Http\Controllers;

use App\Models\UserLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLibraryController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userlibraries = UserLibrary::where('UserID', $user->id)->get();
        return view('UserLibrary')->with('userlibraries', $userlibraries);
    }

    public function delete($ISBN){
        $user = Auth::user();
        UserLibrary::where('ISBN', $ISBN)->where('UserID', $user->id)->delete();
        return redirect()->route('Book Mark');
    }

    public static function getPageByUserId($userID, $ISBN){
        $userLibrary = UserLibrary::where('UserID', $userID)->where('ISBN', $ISBN)->first();
        if($userLibrary == null){
            return 1;
        }

        return $userLibrary->ReadProgress;
    }

    public static function updateBookProgress($ISBN, $page){
        $user = Auth::user();
        if($user){
            $existingRecord = UserLibrary::where('ISBN', $ISBN)->where('UserID', $user->id)->first();
            if($existingRecord != null){
                $existingRecord->update([
                    'ReadProgress' => $page
                ]);
            }
            else{
                UserLibrary::create([
                    'ISBN' => $ISBN,
                    'UserID' => $user->id,
                    'ReadProgress' => $page
                 ]);
            }
            QuestTrackerController::updateQuest($user->id);
        }
    }
}
