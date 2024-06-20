<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        return view('AddForum');
     }

     public function createForum(Request $request){
        $validateData = $request->validate([
            'Topic' => 'required|max:225',
            'Subject' => 'required',
        ]);

        Forum::create([
            'Topic' => $validateData['Topic'],
            'Subject' => $validateData['Subject']
        ]);

        return redirect()->route('Dashboard');
     }
}
