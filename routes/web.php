<?php

Route::get('/', 'PageController@index')->name('index');
Route::get('/home', 'HomeController@index'); //TODO: DEL


//Авторизация/Региастрация
Route::group(['prefix' => 'login', 'middleware' => 'guest'], static function () {
    Route::get('/', 'LoginController@index')->name('sign in');
    Route::post('/', 'LoginController@authenticate')->name('login');

    Route::get('register', 'LoginController@registerView');
    Route::post('register', 'LoginController@register')->name('register');

    Route::get('logout', 'LoginController@index')->name('logout'); //TODO: Processing
});

//Панель управления
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], static function () {
    Route::get('/', function () {
        return 'dashboard';
    })->name('Dashboard index');
});
