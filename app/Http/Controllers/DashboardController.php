<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $getAllBook = DB::table('books')->get();
        $getAllGenre = Genre::all();
        return view('Dashboard')->with(['getAllBook' => $getAllBook, 'genres' => $getAllGenre]);
    }


    public function filter(Request $request){
        $query = $request->input('searchquery', '');
        $genresQuery = $request->input('genresearchlist', []);

        $books = DB::table('books')
            ->join('book_genre', 'books.ISBN', '=', 'book_genre.book_ISBN')
            ->join('genres', 'book_genre.genre_id', '=', 'genres.id')
            ->where(function($q) use ($query) {
                if ($query) {
                    $q->where('books.BookTitle', 'LIKE', '%' . $query . '%');
                }
            })
            ->where(function($q) use ($genresQuery) {
                if ($genresQuery) {
                    $q->whereIn('genres.id', $genresQuery);
                }
            })
            ->select('books.*')
            ->distinct()
            ->get();

        $getAllGenre = Genre::all();
        return view('Dashboard')->with(['getAllBook' => $books, 'genres' => $getAllGenre]);
    }
}
