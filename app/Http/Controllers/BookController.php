<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('AddBook');
    }

    public function addBook(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('Admin Dashboard');
    }
}
