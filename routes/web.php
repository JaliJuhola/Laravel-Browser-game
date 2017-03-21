<?php
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/player/create', 'PlayerController@index')
        ->name('player/create');
    Route::post('/player/save', 'PlayerController@save')
        ->name('player/save');
    Route::group(['admin' => 'admin'], function() {
        Route::get('/admin', 'AdminController@index')->name('/admin');
        Route::get('/admin/user/delete', 'AdminController@deleteUser')->name('/admin/delete/user');
    });
    Route::post('/user/profile/update', 'UserController@update')->name('profile/update');
    Route::get('/user/profile', "UserController@index")->name('profile');
    Route::post('/user/delete', 'UserController@delete')->name('user/delete');

    Route::group(['middleware' => 'accountVerified'], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/city/view', 'CityController@index')->name('city/view');
        Route::get('/players', 'PlayerController@playersIndex')->name('/players');
    });
});