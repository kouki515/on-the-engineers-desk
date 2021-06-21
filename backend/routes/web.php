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

use App\Http\Controllers\SearchController;

Auth::routes();

Route::get('/', 'HomeController@show')->name('home');

Route::get('/mypage', 'userController@mypage')->name('mypage');

Route::group(['prefix' => 'users', 'middleware' => 'auth'], function () {
    Route::get('show/{id}', 'UserController@show')->name('users.show');
    // Route::get('edit/{id}', 'UserController@edit')->name('users.edit');
  // Route::post('update/{id}', 'UserController@update')->name('users.update');
});

Route::prefix('search')->group(function () {
    Route::get('/', 'SearchController@show')->name('search');
    Route::post('/', 'SearchController@search');

    Route::post('/store', 'SearchController@store')->name('device.store');
});

Route::get('/test', 'TestController@show')->name('test');
Route::post('/test', 'TestController@test');

// Github OAuth
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('/login/callback/github', 'Auth\LoginController@handleProviderCallback');
