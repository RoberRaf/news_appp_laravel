<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit')->where('id', '[0-9]+');
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');
Route::post('/posts/create', [PostController::class, 'submitNewPost'])->name('posts.create');
Route::post('/posts/edit/{id}', [PostController::class, 'editPost'])->name('posts.edit')->where('id', '[0-9]+');
Route::get('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete')->where('id', '[0-9]+');
