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
    return view('image.home');
})->name('home');

Route::post('/uploads', 'ImageController@upload')->name('uploads');
Route::get('/uploads', 'ImageController@form')->name('form');
Route::get('/show/{id}', 'ImageController@show')->name('show');