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

Route::get('/', 'PostsController@index');

Route::get('/api/getPosts', 'PostsController@getPosts');
Route::get('/api/getOnePost', 'PostsController@getOnePost');
Route::post('/api/createPost', 'PostsController@createPost');
Route::put('/api/updatePost', 'PostsController@updatePost');
Route::delete('/api/deletePost', 'PostsController@deletePost');
