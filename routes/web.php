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

//BookController
Route::get('/', 'BookController@index')->middleware('auth');

Route::get('/novel', 'BookController@novel');

Route::get('/novel/execute','BookController@novelExecute');

Route::post('/novel/execute','BookController@novelExecute');

Route::get('/comic', 'BookController@comic');

Route::get('/comic/execute','BookController@comicExecute');

Route::post('/comic/execute','BookController@comicExecute');

Route::get('/search', 'BookController@search');

Route::get('/bookmark','BookController@bookmark');

Auth::routes();

Route::post('/search/save', 'BookController@bookapi');

Route::post('/search/imagesave', 'BookController@bookimageapi');

Route::get('/search/execute', 'BookController@searchExecute');

Route::post('/search/execute', 'BookController@searchExecute');

//PostController
Route::get('/bbs','PostController@index');

Route::post('/bbs','PostController@store');

//ScoreController
Route::get('/book/{book}','ScoreController@index');

Route::post('/books/score','ScoreController@store');

Route::get('/books/{book}','ScoreController@search');

//BookMarkController
Route::post('/bookmark/{book}','BookMarkController@store');

Route::delete('/bookmark/{book}','BookMarkController@destroy');

//RankingController
Route::get('/ranking','RankingController@index');

//HomeController
Route::get('/home', 'HomeController@index')->name('home');
