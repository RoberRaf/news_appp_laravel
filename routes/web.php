<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Api\AuthController;

Route::get('/auth/redirect', [AuthController::class, 'github'])->name('github');

Route::get('/auth/callback', [AuthController::class, 'githubCallback'])->name('callback');


Route::redirect('/', '/home')->name('posts.index');
Route::resource('posts', PostController::class);
Route::get('posts/restore', [PostController::class, 'restore'])->name('posts.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

