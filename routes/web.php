<?php

Route::get('/', 'PageController@index')->name('index');
Route::get('/home', 'HomeController@index'); //TODO: DEL

Route::prefix('login')->group(function () {
    Route::get('index', 'LoginController@index');
    Route::post('index', 'LoginController@authenticate')->name('login');
    Route::get('logout', 'LoginController@index')->name('logout'); //TODO: Processing
});
