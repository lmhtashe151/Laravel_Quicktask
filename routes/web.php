<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
Route::resource('users', UserController::class);
Route::get('/', function () {
    return view('welcome');
});


// use App\Http\Controllers\PostController;

// // Route cho UserController
// Route::get('users', [UserController::class, 'index'])->name('users.index');
// Route::get('users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('users', [UserController::class, 'store'])->name('users.store');
// Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// // Route cho PostController
// Route::get('posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('posts', [PostController::class, 'store'])->name('posts.store');
// Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::middleware('checkAdmin')->group(function () {
    // Các route CRUD user chỉ có quyền truy cập với người dùng là admin
    Route::resource('users', UserController::class);
});