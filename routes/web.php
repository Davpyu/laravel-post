<?php

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

Route::get('/post', 'PostController@index');
Route::get('/post/{post:slug}', 'PostController@show');
Route::post('/post', 'PostController@store');
Route::put('/post/{post}', 'PostController@update');
Route::delete('post/{post}', 'PostController@destroy');
Route::get('user/{user_id}/post', 'PostController@userPost');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');
