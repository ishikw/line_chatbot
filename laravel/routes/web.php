<?php

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

/*
|------------------------------------------------------------------------------------
| Admin
|------------------------------------------------------------------------------------
*/
Route::group(['prefix' => ADMIN, 'as' => ADMIN . '.', 'middleware'=>['auth', 'Role:10']], function () {
    Route::get('/', 'DashboardController@index')->name('dash');
    Route::resource('users', 'UserController');
    Route::get('bot/chat', 'BotController@chat')->name('bot.chat');
    Route::resource('bot', 'BotController');
    Route::resource('store', 'StoreController');
    Route::resource('badget', 'BadgetController');
    Route::resource('event', 'EventController');
});

Route::get('/', function () {
    return view('welcome');
});
