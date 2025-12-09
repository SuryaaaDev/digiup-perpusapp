<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return 'Halaman about.';
// });

// Route::get('user/{name}', function ($name) {
//     return 'Hello, ' . $name;
// });

// Route::get('profile', function () {
//     $data = [
//         'name' => 'Surya',
//         'age' => 17
//     ];
//     return view('profile', compact('data'));
// });

// Route::resource('contact', ContactController::class);

Route::get('/', [BookController::class, 'welcome'])->name('welcome');
Route::get('/books/user/{id}', [BookController::class, 'showuser'])->name('books.showuser');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
});

// Cart Routes (No Authentication Required)
Route::post('/cart', [CartController::class, 'store'])->name('cart.store'); // Add to cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // View cart
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy'); // Remove from cart