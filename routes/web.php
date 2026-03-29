<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;









//tags
Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
Route::post('tags', [TagController::class, 'create'])->name('create_tag');
Route::get('/tag/{id}', [TagController::class, 'getTagById'])->name('tag.show');
Route::delete('/tag/{id}', [TagController::class, 'deleteTag'])->name('tag.delete');

Route::get('/get', [TagController::class, 'LinkTagsWithPosts']);



//Auth
Route::get('/signup', [AuthController::class, 'showsignupForm'])->name('signup.show');
Route::get('/login', [AuthController::class, 'showloginForm'])->name('login.show');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//middleware
Route::middleware('auth')->group(function () {

    Route::resource('posts', PostController::class);
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('post.comment.store');
});


Route::middleware('Me')->group(function(){
Route::get('/home', HomeController::class);
Route::get('/contact', ContactController::class);
Route::get('/about', AboutController::class);
});