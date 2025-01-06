<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblPostController;

Route::get('/', [TblPostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}/edit', [TblPostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [TblPostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}', [TblPostController::class, 'destroy'])->name('posts.destroy');
