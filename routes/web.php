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
Route::get('/edit-category/{id}', 'CategoryController@editCategory')->name('editCategory');
Route::post('/update-category/{id}', 'CategoryController@updatetCategory')->name('updateCategory');
Route::get('/delete-category/{id}', 'CategoryController@deleteCategory')->name('deleteCategory');
//post
Route::get('/all-post', 'PostController@index')->name('allPost');
Route::get('/postByid/{id}', 'PostController@postByid')->name('postByid');
Route::post('/update-post/{id}', 'PostController@updatePost')->name('updatePost');
Route::get('/post-delete/{id}', 'PostController@postDelete')->name('post-delete');
Route::post('/add-post', 'PostController@addPost')->name('addPost');
//users
Route::get('/get-all-users', 'UserController@allUsers')->name('allUsers');
