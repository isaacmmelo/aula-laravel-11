<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('users/create', [UserController::class, 'create'])->name('user.create');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('users/{user}', [UserController::class, 'show'])->name('user.show');
Route::put('users/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('users', [UserController::class, 'store'])->name('user.store');

Route::get('users', [UserController::class, 'index'])->name('user.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
