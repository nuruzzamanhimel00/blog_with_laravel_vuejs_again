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



// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');

Route::get('/admin', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('posts');
//***** Category ****** */
Route::post('/add-catoegy', 'CategoryController@addCategory')->name('addCategory');

Route::get('/get-all-category', 'CategoryController@getAllCategory')->name('getAllCategory');

