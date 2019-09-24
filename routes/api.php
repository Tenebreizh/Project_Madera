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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| User type route
|--------------------------------------------------------------------------
*/
Route::get('userTypes', 'UserTypeController@index');
Route::post('userType', 'UserTypeController@store');
Route::get('userType/{userType}', 'UserTypeController@show');
Route::put('userType/{userType}', 'UserTypeController@update');
Route::delete('userType/{userType}', 'UserTypeController@destroy');

/*
|--------------------------------------------------------------------------
| User route
|--------------------------------------------------------------------------
*/
Route::get('users', 'UserController@index');
Route::post('user', 'UserController@store');
Route::get('user/{user}', 'UserController@show');
Route::put('user/{user}', 'UserController@update');
Route::delete('user/{user}', 'UserController@destroy');

/*
|--------------------------------------------------------------------------
| Action route
|--------------------------------------------------------------------------
*/
Route::get('actions', 'ActionController@index');
Route::post('action', 'ActionController@store');
Route::get('action/{action}', 'ActionController@show');
Route::put('action/{action}', 'ActionController@update');
Route::delete('action/{action}', 'ActionController@destroy');

/*
|--------------------------------------------------------------------------
| Log route
|--------------------------------------------------------------------------
*/
Route::get('logs', 'LogController@index');
Route::post('log', 'LogController@store');
Route::get('log/{log}', 'LogController@show');
Route::put('log/{log}', 'LogController@update');
Route::delete('log/{log}', 'LogController@destroy');
