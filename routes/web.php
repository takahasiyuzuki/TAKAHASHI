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

//top
Route::get('/top', 'ArticleController@top')->name('top');


Auth::routes();

//ホーム
Route::get('/home', 'ArticleController@index')->name('index');
//一覧表示
Route::get('/index', 'ArticleController@index')->name('index');
//新規作成画面
Route::get('/create', 'ArticleController@create')->name('create');
//新規作成機能
Route::post('/store', 'ArticleController@store')->name('store');
//記事詳細画面
Route::get('/show/{id}', 'ArticleController@show')->name('show');
//編集画面
Route::get('/edit/{id}', 'ArticleController@edit')->name('edit');
//削除
Route::get('/destroy/{id}', 'ArticleController@destroy')->name('destroy');
//更新
Route::post('/update/{id}', 'ArticleController@update')->name('update');

//ユーザー一覧
Route::get('/management', 'UserController@management')->name('management');
//ユーザー詳細画面
Route::get('/user/{id}', 'UserController@user')->name('user');
//編集画面
Route::get('/profile/{id}', 'UserController@profile')->name('profile');
//ユーザ-更新
Route::post('/renewal/{id}', 'UserController@renewal')->name('renewal');
//ユーザー削除
Route::get('/delete/{id}', 'UserController@delete')->name('delete');