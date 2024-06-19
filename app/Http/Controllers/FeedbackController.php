<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request, $ISBN)
    {
        Feedback::create([
            'UserId' => "12345",
            'ISBN' => $ISBN,
            'Subject' => $request->Subject,
            'Rating' => $request->Rating
        ]);

        return redirect()->route('Dashboard');
    }

    public static function getAllFeedbackWithISBN($ISBN)
    {
        $feedbacks = Feedback::where('ISBN', $ISBN)->with('user')->get();
        return $feedbacks;
    }
}
