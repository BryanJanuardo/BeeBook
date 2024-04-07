<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        return view('AddGenre');
    }

    public function editIndex($id)
    {
        $genre = Genre::findOrFail($id);
        return view ('EditGenre')->with('genre', $genre);
    }

    public function NewGenre(Request $request)
     {
         $validatedData = $request->validate([
             'GenreName' => 'required'
         ]);



         return redirect()->route('Add Book');
     }
}
