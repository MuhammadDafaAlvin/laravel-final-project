<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TblPostController;

Route::get('/', [TblPostController::class, 'index'])->name('posts.index');
