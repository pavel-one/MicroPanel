<?php

use App\Http\Middleware\CheckActive;

Route::get('/', 'PageController@index')->middleware('guest')->name('index');

//Авторизация/Регистрация
Route::group(['prefix' => 'login', 'middleware' => 'guest'], static function () {
    Route::get('/', 'LoginController@index')->name('sign in');
    Route::post('/', 'LoginController@authenticate')->name('login');

    Route::get('register', 'LoginController@registerView');
    Route::post('register', 'LoginController@register')->name('register');
});
Route::post('logout', 'LoginController@logout')->name('logout');

//Панель управления
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', CheckActive::class]], static function () {
    Route::get('/', 'DashboardController@index')->name('Dashboard index');
    Route::get('sorry', 'DashboardController@sorry')->name('dashboard.sorry');
});
