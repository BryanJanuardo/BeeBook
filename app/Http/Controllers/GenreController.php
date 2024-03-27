<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        return view('AddGenre');
     }

     public function NewGenre(Request $request)
     {
         $validatedData = $request->validate([
             'GenreName' => 'required'
         ]);

         $id = IdGenerator::generate([
             'table' => 'genres',
             'field' => 'GenreId',
             'length' => 5,
             'prefix' => 'GE'
         ]);
         $store = new Genre();
         $store->GenreId = $id;
         $store->GenreName = $validatedData['GenreName'];
         $store->save();
         return redirect()->route('Add Book')->with('success','New genre added!');
     }
}

