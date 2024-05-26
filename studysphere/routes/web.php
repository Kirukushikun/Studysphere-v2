<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts');
});





// Route::get('/publish', function () {
//     return view('publish');
// });



Route::get('/publish', [PostController::class, 'loadPost'])->name('publish');

Route::get('/add', function () {
    return view('add-post');
});

Route::post('/addpost', [PostController::class, 'addPost'])->name('post.add');






Route::get('/comments', function () {
    return view('comments');
});

Route::get('/user', function () {
    return view('userprofile');
});

Route::get('/dashboard', function () {
    return view('dash');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
