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
| Component Type Routes
|--------------------------------------------------------------------------
*/
Route::get('/component_types', 'ComponentTypeController@index');
Route::post('/component_type', 'ComponentTypeController@store');
Route::get('/component_type/{componentType}', 'ComponentTypeController@show');
Route::put('/component_type/{componentType}', 'ComponentTypeController@update');
Route::get('/component_type/{componentType}/components', 'ComponentTypeController@components');
Route::delete('/component_type/{componentType}', 'ComponentTypeController@destroy');

/*
|--------------------------------------------------------------------------
| Component Routes
|--------------------------------------------------------------------------
*/
Route::get('/components', 'ComponentController@index');
Route::post('/component', 'ComponentController@store');
Route::get('/component/{component}', 'ComponentController@show');
Route::put('/component/{component}', 'ComponentController@update');
Route::get('/component/{component}/componentType', 'ComponentController@componentType');
Route::delete('/component/{component}', 'ComponentController@destroy');

/*
|--------------------------------------------------------------------------
| Taxe Routes
|--------------------------------------------------------------------------
*/
Route::get('/taxes', 'TaxeController@index');
Route::post('/taxe', 'TaxeController@store');
Route::get('/taxe/{taxe}', 'TaxeController@show');
Route::put('/taxe/{taxe}', 'TaxeController@update');
Route::delete('/taxe/{taxe}', 'TaxeController@destroy');