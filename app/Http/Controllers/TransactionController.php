<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function test($ISBN, $UserID)
    {
        dd($ISBN, $UserID);
    }

}
