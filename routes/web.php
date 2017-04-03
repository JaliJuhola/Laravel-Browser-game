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

    Route::group(['middleware' => 'admin'], function() {
        Route::post('admin/announcements/delete', "AdminController@deleteAnnouncement");
        Route::post('admin/announcements/change', "AdminController@updateAnnouncement");
        Route::post('admin/announcements/save', "AdminController@saveAnnouncement");
        Route::get('/admin', 'AdminController@index')->name('/admin');
        Route::post('/admin/user/delete', 'AdminController@deleteUser')->name('/admin/delete/user');
        Route::get('/admin/map', 'AdminController@map')->name('/admin/map');
        Route::get('adminPlayers.json',  "AdminController@usersJson");
        Route::post('deleteAdminXHTML', "AdminController@deleteUser");
        Route::post('deleteAdminCity', "AdminController@deleteCity");
    });

    Route::group(['middleware' => 'accountVerified'], function () {
        Route::post('/user/profile/update', 'UserController@update')->name('profile/update');
        Route::get('/user/profile', "UserController@index")->name('profile');
        Route::post('/user/delete', 'UserController@deleteUser')->name('user/delete');
        Route::get('announcements.json', 'HomeController@announcementsJson');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/city/view', 'CityController@index')->name('city');
        Route::get('/players', 'PlayerController@playersIndex')->name('/players');
        Route::get('/map', 'GameworldController@index')->name('/map');
        Route::post('city/update/name', "CityController@updateName")->name('city/update/name');
        Route::post("army/train/{id}", "ArmyController@addTroops")->name("army/train/{id}");
        Route::post('addCity', 'CityController@addCity')->name('addCity');
        Route::get("userCities.json", 'CityController@usersCitiesJson')->name("userCities.json");
        Route::get("city/userCities.json", 'CityController@usersCitiesJson')->name("city/userCities.json");
        Route::get('/city/cityView.json', "CityController@cityJson");
        Route::post('setActive', "CityController@setActive");
        Route::post('city/setActive', "CityController@setActive");
        Route::post('city/city/setActive', "CityController@setActive");
        Route::post('/city/{id}/attack', 'ArmyController@attackToCity');
        Route::get('/city/{id}', 'CityController@index')->name('city/view/{id}');
        Route::get('mapSquares.json', "GameworldController@mapJson");
        });
    });
});