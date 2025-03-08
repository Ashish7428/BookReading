<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\CheckSession;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

// Protected routes that require authentication
Route::middleware([CheckSession::class])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Book routes
    Route::get('/books', [BookController::class, 'index'])->name('books.all');
    Route::get('/books/liked', [BookController::class, 'liked'])->name('books.liked');
    Route::get('/books/reading', [BookController::class, 'reading'])->name('books.reading');
    Route::get('/books/recommended', [BookController::class, 'recommended'])->name('books.recommended');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::post('/book/{id}/like', [BookController::class, 'toggleLike'])->name('book.like');

    // User profile routes
    Route::get('/change-password', [AuthController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change.password.submit');
    Route::get('/change-name', [AuthController::class, 'showChangeNameForm'])->name('change.name');
    Route::post('/change-name', [AuthController::class, 'changeName'])->name('change.name.submit');
});
