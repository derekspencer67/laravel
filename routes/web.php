<?php

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



Auth::routes();

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::patch('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@destroy');

Route::get('/hidden/{themeId}', "HomeController@setCookie")->name('theme');

Route::get('/admin/users', 'UserController@index');
Route::get('/admin/users/create', 'UserController@create');
Route::post('/admin/users', 'UserController@store');
Route::get('/admin/users/{user}', 'UserController@show');
Route::get('/admin/users/{user}/edit', 'UserController@edit');
Route::patch('/admin/users/{user}', 'UserController@update');
Route::delete('/admin/users/{user}', 'UserController@destroy');

Route::get('/themes', 'ThemeController@index');
Route::get('/themes/create', 'ThemeController@create');
Route::get('/themes/{theme}', 'ThemeController@show');
Route::post('/themes', 'ThemeController@store');
Route::get('/themes/{theme}/edit', 'ThemeController@edit');
Route::patch('/themes/{theme}', 'ThemeController@update');
Route::delete('/themes/{theme}', 'ThemeController@destroy');

