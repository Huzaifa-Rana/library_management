<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\DashboardController;
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
//Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Books Routes
Route::resource('books', BookController::class);

// Rental Routes
Route::resource('rentals', RentalController::class);
Route::post('books/{book}/rent', [RentalController::class, 'rent'])->name('rentals.rent');
Route::post('rentals/{rental}/return', [RentalController::class, 'returnBook'])->name('rentals.return');

// Authors Routes
Route::resource('authors', AuthorController::class);



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
