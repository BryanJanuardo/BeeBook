<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function test($ISBN, $UserID)
    {
        $book = Book::where('ISBN', '=', $ISBN)->firstOrFail();
        $user = User::where('name', '=', $UserID)->firstOrFail();

        $book->attach($user);
    }

}
