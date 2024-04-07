<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Dashboard', [DashboardController::class, 'index'])->name('Dashboard');

Route::get('/AdminDashboard', [AdminDashboardController::class, 'index'])->name('Admin Dashboard');

Route::get('/DetailBook/{id}', [BookController::class, 'detailBook'])->name('Detail Book');

Route::get('/AboutUs', [AboutController::class, 'index'])->name('About Us');

Route::get('/AddBook', [BookController::class, 'index'])->name('Add Book');
Route::get('/EditBook', [BookController::class, 'editIndex'])->name('Edit Book');

Route::get('/AddGenre', [GenreController::class, 'index'])->name('Add Genre');
Route::get('/EditGenre', [GenreController::class, 'editIndex'])->name('Edit Genre');
Route::delete('/deleteGenre/{id}', [GenreController::class, 'deleteIndex'])->name('deleteGenre.deleteIndex');

Route::post('/AddBook/post', [BookController::class, 'addBook'])->name('Post Book');
 