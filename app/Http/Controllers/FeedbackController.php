<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function store(Request $request, $ISBN)
    {
        $user = Auth::user();
        if($user == null){
            return redirect()->route('Detail Book', ['ISBN' => $ISBN]);
        }

        Feedback::create([
            'UserId' => $user->id,
            'ISBN' => $ISBN,
            'Subject' => $request->Subject,
            'Rating' => $request->Rating
        ]);

        return redirect()->route('Detail Book', ['ISBN' => $ISBN]);
    }

    public static function getAllFeedbackWithISBN($ISBN)
    {
        $feedbacks = Feedback::where('ISBN', $ISBN)->with('user')->get();
        return $feedbacks;
    }
}
