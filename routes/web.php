<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblPostController;
use App\Http\Controllers\PostController;

Route::get('/', [TblPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}/edit', [TblPostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [TblPostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [TblPostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/create', [TblPostController::class, 'create'])->name('posts.create'); // Menampilkan form
Route::post('/posts', [TblPostController::class, 'store'])->name('posts.store'); // Menyimpan data
