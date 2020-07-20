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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('gyms/search', 'GymController@search')->name('gyms.search');

Route::resource('gyms', 'GymController');
Route::get('user/show', 'UserController@show')->name('user.show');



Route::resource('comments', 'CommentController');

Route::post('gyms/{gym}/favorites', 'BookmarkController@store')->name('favorites');
Route::post('gyms/{gym}/unfavorites', 'BookmarkController@destroy')->name('unfavorites');

