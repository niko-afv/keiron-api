<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

    });
});


Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('users', 'UsersController');
    Route::get('/users/{user_id}/tickets','UsersController@tickets');
    Route::get('/tickets/{ticket_id}','TicketsController@show');
    Route::get('/tickets','TicketsController@index');
    Route::put('/tickets/{ticket_id}','TicketsController@update');
    Route::post('/tickets','TicketsController@store');
});

