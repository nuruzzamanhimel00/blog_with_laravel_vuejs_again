<?php


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



// Route::get('/{anypath}', 'HomeController@index')->where('path','.*');

//******************* Public panel ********************* */
Route::get('/', 'PublicController@index')->name('home');

Route::get('/getSinglePostByid/{id}', 'BlogController@singlePostById')->name('getSinglePostByid');
Route::get('/public-all-post', 'BlogController@getAllPost')->name('public.allPost');
Route::get('/public-get-all-category', 'BlogController@getAllCategory')->name('public.getAllCategory');
Route::get('/public-get-post-catid/{id}', 'BlogController@getPostByCatid')->name('public.catid');

Route::get('//public-sidebar-latest-post', 'BlogController@getLatestPost')->name('public.latestPost');

// *************** Admin Panel ****************************
Route::get('/admin', 'HomeController@index')->name('admin');

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
