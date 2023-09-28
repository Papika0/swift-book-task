<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'show')->name('home');
    Route::post('/login', 'login')->name('login');
    Route::get('/login', 'show')->name('login.show');
    Route::get('/dashboard', 'dashboard')->name('dashboard')->middleware('auth');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/books')->controller(BookController::class)->group(function () {
        Route::get('/', 'index')->name('books.index');
        Route::get('/create', 'create')->name('books.create');
        Route::post('/', 'store')->name('books.store');
        Route::get('/{book}/edit', 'edit')->name('books.edit');
        Route::put('/{book}', 'update')->name('books.update');
        Route::delete('/{book}', 'destroy')->name('books.destroy');
    });

    Route::prefix('/authors')->controller(AuthorController::class)->group(function () {
        Route::get('/', 'index')->name('authors.index');
        Route::get('/create', 'create')->name('authors.create');
        Route::post('/', 'store')->name('authors.store');
        Route::get('/{author}/edit', 'edit')->name('authors.edit');
        Route::put('/{author}', 'update')->name('authors.update');
        Route::delete('/{author}', 'destroy')->name('authors.destroy');
    });
});
