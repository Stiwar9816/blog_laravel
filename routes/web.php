<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [HomeController::class, "show"]);

Route::prefix('posts/')->group(function () {

    Route::controller(PostsController::class)->group(function () {

        Route::middleware('auth')->group(function () {

            Route::get('create', "create")->name('posts.create');
            Route::post('', "store")->name('posts.store');
            Route::get('{post}/edit', "edit")->name('posts.edit');
            Route::patch('{post}', "update")->name('posts.update');
            Route::delete('{post}', "destroy")->name('posts.destroy');

        });
        Route::get('{post}', "show");
    });
});

Route::middleware(['forbidden.words', 'auth'])
    ->post('/posts/{post}/comments', [CommentsController::class, 'store'])->name('comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
