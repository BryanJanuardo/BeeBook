<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\UserLibrary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserLibraryController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userlibraries = UserLibrary::where('UserID', $user->id)->get();
        $genres = Genre::all();
        return view('UserLibrary')->with(['userlibraries' => $userlibraries,
        'genres' => $genres]);
    }



    public function filter(Request $request){
        $query = $request->input('searchquery', '');
        $genresQuery = $request->input('genresearchlist', []);
        $user = Auth::user();

        $userlibraries =  UserLibrary::where('UserId', $user->id)
        ->whereHas('book', function ($queryBuilder) use ($query, $genresQuery) {
            if (!empty($query)) {
                $queryBuilder->where('BookTitle', 'like', '%' . $query . '%');
            }
            if (!empty($genresQuery)) {
                $queryBuilder->whereHas('genres', function ($q) use ($genresQuery) {
                    $q->whereIn('id', $genresQuery);
                });
            }
        })
        ->get();

        $getAllGenre = Genre::all();
        return view('UserLibrary')->with(['userlibraries' => $userlibraries, 'genres' => $getAllGenre]);
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
