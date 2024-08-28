<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RawPostController;
use App\Http\Controllers\PostController;

//
//Route::get('/', function () {
//    $posts = Post::paginate(3);
//    return view('index', ['posts' => $posts,]);// 'pageNu
//})->name('posts.index');

//
Route::redirect('/', 'posts')->name('posts.index');
//Route::get('/posts/create', [RawPostController::class, 'create'])->name('posts.create');
//Route::get('/posts/edit/{id}', [RawPostController::class, 'edit'])->name('posts.edit')->where('id', '[0-9]+');
//Route::get('/posts/show/{id}', [RawPostController::class, 'show'])->name('posts.show')->where('id', '[0-9]+');
//Route::post('/posts/create', [RawPostController::class, 'submitNewPost'])->name('posts.create');
//Route::post('/posts/edit/{id}', [RawPostController::class, 'editPost'])->name('posts.edit')->where('id', '[0-9]+');
//Route::get('/posts/delete/{id}', [RawPostController::class, 'delete'])->name('posts.delete')->where('id', '[0-9]+');

Route::get('posts/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::resource('posts', PostController::class);
