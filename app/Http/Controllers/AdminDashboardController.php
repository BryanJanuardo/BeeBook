<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $getAllBook = DB::table('books')->get();
        // dd($getAllBook);
        return view('AdminDashboard')->with('getAllBook', $getAllBook);
    }
}
