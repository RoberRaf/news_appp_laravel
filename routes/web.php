<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RawPostController;
use App\Http\Controllers\PostController;


Route::redirect('/', '/home')->name('posts.index');
Route::resource('posts', PostController::class);
Route::get('posts/restore', [PostController::class, 'restore'])->name('posts.restore');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
*  GET|HEAD        api/user ....................................................................................
*  GET|HEAD        home ............................................................ home › HomeController@index
*  GET|HEAD        login ............................................ login › Auth\LoginController@showLoginForm
*  POST            login ............................................................ Auth\LoginController@login
*  POST            logout ................................................. logout › Auth\LoginController@logout
*  GET|HEAD        password/confirm .......... password.confirm › Auth\ConfirmPasswordController@showConfirmForm
*  POST            password/confirm ..................................... Auth\ConfirmPasswordController@confirm
*  POST            password/email ............ password.email › Auth\ForgotPasswordController@sendResetLinkEmail
*  GET|HEAD        password/reset ......... password.request › Auth\ForgotPasswordController@showLinkRequestForm
*  POST            password/reset ......................... password.update › Auth\ResetPasswordController@reset
*  GET|HEAD        password/reset/{token} .......... password.reset › Auth\ResetPasswordController@showResetForm
*  GET|HEAD        posts .................................................... posts.index › PostController@index
*  POST            posts .................................................... posts.store › PostController@store
*  GET|HEAD        posts/create ........................................... posts.create › PostController@create
*  GET|HEAD        posts/restore ........................................ posts.restore › PostController@restore
*  GET|HEAD        posts/{post} ............................................... posts.show › PostController@show
*  PUT|PATCH       posts/{post} ........................................... posts.update › PostController@update
*  DELETE          posts/{post} ......................................... posts.destroy › PostController@destroy
*  GET|HEAD        posts/{post}/edit .......................................... posts.edit › PostController@edit
*  GET|HEAD        register ............................ register › Auth\RegisterController@showRegistrationForm
*  POST            register ................................................... Auth\RegisterController@register
*  GET|HEAD        sanctum/csrf-cookie ....... sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show
*  GET|HEAD        up ..........................................................................................
*/
