<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::resource('post', 'PostController')->except(['index', 'show']);

Route::get('/', 'PostController@index')->name('post.index');

Route::name('post.')->group(function () {
    Route::get('post/search', 'PostController@search')->name('search');
    Route::get('post/{post:slug}', 'PostController@show')->name('show');
    Route::get('user/{user_id}/post', 'PostController@userPost')->name('by.user');
});

Route::post('post/{id}/comments', 'CommentController@store')->name('comment.store');

Route::name('auth.')->group(function () {
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('register', 'UserController@registerForm')->name('register.form');
    Route::get('login', 'UserController@loginForm')->name('form.login');
    Route::post('register', 'UserController@register')->name('register');
    Route::post('login', 'UserController@login')->name('login');
    Route::get('logout', 'UserController@logout')->name('logout')->middleware('auth');
});
