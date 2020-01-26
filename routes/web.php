<?php

Route::get('/', 'PageController@index')->middleware('guest')->name('index');
Route::get('/home', 'HomeController@index'); //TODO: DEL


//Авторизация/Региастрация
Route::group(['prefix' => 'login', 'middleware' => 'guest'], static function () {
    Route::get('/', 'LoginController@index')->name('sign in');
    Route::post('/', 'LoginController@authenticate')->name('login');

    Route::get('register', 'LoginController@registerView');
    Route::post('register', 'LoginController@register')->name('register');

    Route::post('logout', 'LoginController@logout')->name('logout');
});

//Панель управления
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], static function () {
    Route::get('/', function () {
        return 'dashboard';
    })->name('Dashboard index');
});
