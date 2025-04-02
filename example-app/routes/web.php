<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books', [BookController::class, 'index'])->name('index');
Route::get('/books/create', [BookController::class, 'create'])->name('create');
Route::post('/books', [BookController::class, 'store'])->name('store');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit');
Route::put('/books/{id}', [BookController::class, 'update'])->name('update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('destroy');
Route::get('/', function () {
    return view('welcome');
});
