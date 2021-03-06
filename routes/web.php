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


Route::get('/home', 'ArticleController@index')->name('index'); 

Route::get('/index', 'ArticleController@index')->name('index'); 

Route::get('/create', 'ArticleController@create')->name('create'); 

Route::post('/store', 'ArticleController@store')->name('store'); 

Route::get('/show/{id}', 'ArticleController@show')->name('show'); 

Route::get('/edit/{id}', 'ArticleController@edit')->name('edit'); 

Route::get('/destroy/{id}', 'ArticleController@destroy')->name('destroy'); 

Route::post('/update/{id}', 'ArticleController@update')->name('update'); 

Route::get('/management', 'ArticleController@management')->name('management'); 

Route::get('/user/{id}', 'ArticleController@user')->name('user'); 

Route::get('/useredit/{id}', 'ArticleController@useredit')->name('useredit'); 

Route::post('/userupdate/{id}', 'ArticleController@userupdate')->name('userupdate'); 

Route::get('/userdestroy/{id}', 'ArticleController@userdestroy')->name('userdestroy'); 