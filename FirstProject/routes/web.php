<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;




Route::get('/', [HomeController::class, 'index']);
Route::get('/posts', [PostsController::class,'all']);
Route::post('/posts/like', [PostsController::class,'like']);
Route::post('/posts/unlike', [PostsController::class,'unlike']);
Route::get('my-liked-posts', [PostsController::class, 'myLikedPosts']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

