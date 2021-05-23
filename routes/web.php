<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group(['middleware' => 'auth'],function(){
  Route::get('/', 'SwipeController@index');

  Route::get('/swipes', 'SwipeController@index')->name('swipes.index');
  Route::post('/swipes', 'SwipeController@store')->name('swipes.store');
  
  Route::get('/chat', 'ChatController@index')->name('chat.index');

  Route::get('/mypage', 'MypageController@index')->name('mypage.index');
  Route::get('/mypage/info', 'MypageController@info');
  Route::post('/mypage/update', 'MypageController@update');

  Route::get('/setting', 'MypageController@setting');
});
