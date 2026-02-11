<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


Route::get('/home',[IndexController::class, 'index']);
Route::get('/contact',[IndexController::class,'contact']);
Route::get('/about',[IndexController::class, 'about']);


//Posts
Route::resource('posts',PostController::class);

//comments
Route::get('/post/{post_id}/comments',[CommentController::class,'index'])->name('comment.index');
Route::get('/comment/{id}',[CommentController::class,'getCommentById'])->name('comment.show');



//tags
Route::get('/tags',[TagController::class,'index'])->name('tag.index');
Route::post('tags',[TagController::class,'create'])->name('create_tag');
Route::get('/tag/{id}',[TagController::class,'getTagById'])->name('tag.show');
Route::delete('/tag/{id}',[TagController::class,'deleteTag'])->name('tag.delete');

Route::get('/get',[TagController::class,'LinkTagsWithPosts']);