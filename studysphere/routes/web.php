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
    return redirect()->route('login');
});

Route::get('/posts', [PostController::class, 'posts'])->name('posts');

Route::get('/postmanager', [PostController::class, 'loadPost'])->name('postmanager');

Route::get('/form', [PostController::class, 'post'])->name('post.load');

Route::post('/form', [PostController::class, 'addPost'])->name('post.post');//ADD
Route::delete('/form/{id}', [PostController::class, 'deletePost'])->name('post.delete');//DELETE
Route::get('post/edit/{id}', [PostController::class, 'editPost'])->name('post.edit');//EDIT
Route::get('post/view/{id}', [PostController::class, 'viewPost'])->name('post.view');//VIEW

Route::get('/comments', [PostController::class, 'loadComments'])->name('comments');

Route::post('/comment', [PostController::class, 'addComment'])->name('comment.post');//ADD

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
