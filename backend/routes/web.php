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

Auth::routes();

Route::get('/', 'HomeController@show')->name('home');

Route::prefix('mypage')->group(function () {
    Route::get('/', 'MypageController@show')->name('mypage.show');
    Route::post('/delete', 'MypageController@delete')->name('mypage.delete');
    Route::post('/new_self_introduction', 'MypageController@new_self_introduction')->name('mypage.new_self_introduction');
    Route::post('/edit_self_introduction', 'MypageController@edit_self_introduction')->name('mypage.edit_self_introduction');
    Route::get('/si/show', 'MypageController@si_show')->name('si.show');
});

Route::prefix('users')->group(function () {
    Route::get('show/{id}', 'UserController@show')->name('users.show');
    Route::post('store', 'UserController@store')->name('users.store');
});

Route::prefix('search')->group(function () {
    Route::get('/', 'SearchController@show')->name('search.show');
    Route::post('/', 'SearchController@search');

    Route::post('/store', 'SearchController@store')->name('search.store');
});

// Github OAuth
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/callback/github', 'Auth\LoginController@handleProviderCallback');
