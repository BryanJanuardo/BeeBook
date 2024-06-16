<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\QuestTrackerController;
use App\Http\Controllers\RegisterController;
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

Route::get('/AboutUs', [AboutController::class, 'index'])->name('About Us');

Route::get('/AddBook', [BookController::class, 'index'])->name('Add Book');
Route::post('/AddBook/post', [BookController::class, 'addBook'])->name('Post Book');

Route::get('/ShowBook/{ISBN}', [BookController::class, 'showBook'])->name('Show Book');
Route::get('/DetailBook/{ISBN}', [BookController::class, 'detailIndex'])->name('Detail Book');
Route::get('/EditBook/{ISBN}', [BookController::class, 'editIndex'])->name('Edit Book');
Route::post('/Wishlist/{ISBN}/{UserId}/Post', [WishlistController::class, 'addWishlist'])->name('Add Wishlist');
Route::patch('/EditBook/{ISBN}/Post', [BookController::class, 'updateBook'])->name('Update Book');
Route::delete('/DeleteBook/{ISBN}', [BookController::class, 'deleteBook'])->name('Delete Book');

Route::get('/AddGenre', [GenreController::class, 'index'])->name('Add Genre');
Route::post('/createGenre' , [GenreController::class, 'createGenre'])->name('Create Genre');

Route::get('/editGenre/{id}', [GenreController::class, 'editIndex'])->name('Edit Genre');

Route::patch('/editGenre/{id}', [GenreController::class, 'editGenre'])->name('editGenre');
Route::delete('/deleteGenre/{id}', [GenreController::class, 'deleteGenre'])->name('deleteGenre');
Route::get('/Register', [RegisterController::class, 'index'])->name('Register');



Route::post('/submit-feedback', [FeedbackController::class, 'store']);

Route::resource('/QuestTracker', QuestTrackerController::class);
