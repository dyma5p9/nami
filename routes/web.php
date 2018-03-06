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

Route::get('/', function () { return view('welcome'); });//welcome route

Auth::routes();//auth routes

Route::get('/redirect', 'SocialAuthFacebookController@redirect');//fb redirect
Route::get('/callback', 'SocialAuthFacebookController@callback');//fb connect


Route::get('/home', 'HomeController@index')->name('home')->middleware('web', 'auth');//all post
Route::any('/like', 'HomeController@like')->name('like')->middleware('web', 'auth');//like/dislike
Route::get('/post/{slug}', 'HomeController@post')->name('post')->middleware('web', 'auth');//single post

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('/home', 'AdminController@index')->name('admin.home');//admin and get all users
});

