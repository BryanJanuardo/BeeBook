<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        return view('AddBook');
    }

    function store(Request $request){
        return $request->input();
    }
}
