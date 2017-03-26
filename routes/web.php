<?php
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'web'], function () {

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/player/create', 'PlayerController@index')
        ->name('player/create');

    Route::post('/player/save', 'PlayerController@save')
        ->name('player/save');

    Route::group(['admin' => 'admin'], function() {
        Route::get('/admin', 'AdminController@index')->name('/admin');
        Route::post('/admin/user/delete', 'AdminController@deleteUser')->name('/admin/delete/user');
        Route::get('/admin/map', 'AdminController@map')->name('/admin/map');
    });
    Route::post('/user/profile/update', 'UserController@update')->name('profile/update');
    Route::get('/user/profile', "UserController@index")->name('profile');
    Route::post('/user/delete', 'UserController@delete')->name('user/delete');
    Route::group(['middleware' => 'accountVerified'], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/city/view', 'CityController@index')->name('city');
        Route::get('/city/{id}', 'CityController@index')->name('city/view/{id}');
        Route::get('/players', 'PlayerController@playersIndex')->name('/players');
        Route::get('/map', 'GameworldController@index')->name('/map');
        Route::post('city/update/name', "CityController@updateName")->name('city/update/name');
        Route::post("army/train/{id}", "ArmyController@addTroops")->name("army/train/{id}");
        Route::post('/city/{id}/attack', 'ArmyController@attackToCity');
    });
});
Route::get('cityView.json', "CityController@cityJson");
Auth::routes();
});