<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima
       
        Feedback::create([
            'UserId' => "12345",
            'ISBN' => "12345",
            'Subject' => $request->Subject,
            'Rating' => $request->Rating
        ]);
      


        // Kembalikan respon sukses
        return redirect()->route('Dashboard');
    }
}
