<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;




Route::get('/', [HomeController::class, 'index']);
Route::post('/posts/create', [PostsController::class, 'create']);
Route::get('/posts/create', [PostsController::class, 'createPage']);
Route::get('/posts', [PostsController::class,'all']);
Route::get('/posts/edit/{id}', [PostsController::class,'editPage']);
Route::post('/posts/edit/{id}', [PostsController::class,'edit']);
Route::get('/posts/delete/{id}', [PostsController::class,'delete']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

