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
Auth::routes(['verify' => true]);
// Route::get('/', 'HomeController@index')->middleware('verified');
// ブログ一覧を表示
Route::get('/', 'BlogController@showList')->name('blogs');
// ブログ登録画面を表示
Route::get('/blog/create', 'BlogController@showCreate')->name('create');
// ブログ登録
Route::post('/blog/store', 'BlogController@exeStore')->name('store');
// ブログ詳細画面を表示
Route::get('/blog/{id}', 'BlogController@showDetail')->name('show');
// ブログ編集画面を表示
Route::get('/blog/edit/{id}', 'BlogController@showEdit')->name('edit');
// ブログ更新画面を表示
Route::post('/blog/update/', 'BlogController@exeUpdate')->name('update');
// ブログ削除画面を表示
Route::get('/blog/checkdelete/{id}', 'BlogController@checkDelete')->name('checkDelete');
// ブログ削除
Route::post('/blog/delete', 'BlogController@exeDelete')->name('delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
