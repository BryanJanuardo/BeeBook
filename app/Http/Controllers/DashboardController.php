<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $getAllBook = DB::table('books')->get();
        return view('Dashboard')->with('getAllBook', $getAllBook);
    }
}
