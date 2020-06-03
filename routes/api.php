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

/*
|--------------------------------------------------------------------------
| Not Authenticated
|--------------------------------------------------------------------------
*/
Route::post('/login', 'AuthController@login');

/*
|--------------------------------------------------------------------------
| Authenticated
|--------------------------------------------------------------------------
*/
Route::middleware('auth:api')->group(function () {
    /*
    |--------------------------------------------------------------------------
    | User Auth
    |--------------------------------------------------------------------------
    */
    Route::get('/user', 'AuthController@user');
    Route::get('/logout', 'AuthController@logout');
    Route::post('/register', 'AuthController@register');
    
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
    Route::delete('user/{user}/logs', 'UserController@deleteLogs');
    Route::get('user/{user}/quotations', 'UserController@quotations');
    
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
    
    /*
    |--------------------------------------------------------------------------
    | Client Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/clients', 'ClientController@index');
    Route::post('/client', 'ClientController@store');
    Route::get('/client/{client}', 'ClientController@show');
    Route::put('/client/{client}', 'ClientController@update');
    Route::delete('/client/{client}', 'ClientController@destroy');
    Route::get('client/{client}/quotations', 'ClientController@quotations');
    
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
    
    /*
    |--------------------------------------------------------------------------
    | Project route
    |--------------------------------------------------------------------------
    */
    Route::get('projects', 'ProjectController@index');
    Route::post('project', 'ProjectController@store');
    Route::get('project/{project}', 'ProjectController@show');
    Route::put('project/{project}', 'ProjectController@update');
    Route::delete('project/{project}', 'ProjectController@destroy');
    Route::get('project/{project}/quotations', 'ProjectController@quotations');
    
    /*
    |--------------------------------------------------------------------------
    | Quotation route
    |--------------------------------------------------------------------------
    */
    Route::get('quotations', 'QuotationController@index');
    Route::post('quotation', 'QuotationController@store');
    Route::get('quotation/{quotation}', 'QuotationController@show');
    Route::put('quotation/{quotation}', 'QuotationController@update');
    Route::delete('quotation/{quotation}', 'QuotationController@destroy');
    Route::get('quotation/{quotation}/quotationLines', 'QuotationController@quotationLines');
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
Route::post('/component/{component}/supplier', 'ComponentController@addSupplier');

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

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/
Route::get('/clients', 'ClientController@index');
Route::post('/client', 'ClientController@store');
Route::get('/client/{client}', 'ClientController@show');
Route::put('/client/{client}', 'ClientController@update');
Route::delete('/client/{client}', 'ClientController@destroy');
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


/*
|--------------------------------------------------------------------------
| External finition route
|--------------------------------------------------------------------------
*/
Route::get('externalFinitions', 'ExternalFinitionController@index');
Route::post('externalFinition', 'ExternalFinitionController@store');
Route::get('externalFinition/{externalFinition}', 'ExternalFinitionController@show');
Route::put('externalFinition/{externalFinition}', 'ExternalFinitionController@update');
Route::delete('externalFinition/{externalFinition}', 'ExternalFinitionController@destroy');

/*
|--------------------------------------------------------------------------
| Insulator route
|--------------------------------------------------------------------------
*/
Route::get('insulators', 'InsulatorController@index');
Route::post('insulator', 'InsulatorController@store');
Route::get('insulator/{insulator}', 'InsulatorController@show');
Route::put('insulator/{insulator}', 'InsulatorController@update');
Route::delete('insulator/{insulator}', 'InsulatorController@destroy');

/*
|--------------------------------------------------------------------------
| Covering route
|--------------------------------------------------------------------------
*/
Route::get('coverings', 'CoveringController@index');
Route::post('covering', 'CoveringController@store');
Route::get('covering/{covering}', 'CoveringController@show');
Route::put('covering/{covering}', 'CoveringController@update');
Route::delete('covering/{covering}', 'CoveringController@destroy');

/*
|--------------------------------------------------------------------------
| Window frame route
|--------------------------------------------------------------------------
*/
Route::get('windowFrames', 'WindowFrameController@index');
Route::post('windowFrame', 'WindowFrameController@store');
Route::get('windowFrame/{windowFrame}', 'WindowFrameController@show');
Route::put('windowFrame/{windowFrame}', 'WindowFrameController@update');
Route::delete('windowFrame/{windowFrame}', 'WindowFrameController@destroy');

/*
|--------------------------------------------------------------------------
| Range route
|--------------------------------------------------------------------------
*/
Route::get('ranges', 'RangeController@index');
Route::post('range', 'RangeController@store');
Route::get('range/{range}', 'RangeController@show');
Route::put('range/{range}', 'RangeController@update');
Route::delete('range/{range}', 'RangeController@destroy');

/*
|--------------------------------------------------------------------------
| Module route
|--------------------------------------------------------------------------
*/
Route::get('modules', 'ModuleController@index');
Route::post('module', 'ModuleController@store');
Route::get('module/{module}', 'ModuleController@show');
Route::put('module/{module}', 'ModuleController@update');
Route::delete('module/{module}', 'ModuleController@destroy');
Route::get('module/{module}/components', 'ModuleController@getComponents');
Route::post('module/{module}/component', 'ModuleController@addComponent');
Route::delete('module/{module}/component', 'ModuleController@deleteComponent');

/*
|--------------------------------------------------------------------------
| Custom module route
|--------------------------------------------------------------------------
*/
Route::get('customModules', 'CustomModuleController@index');
Route::post('customModule', 'CustomModuleController@store');
Route::get('customModule/{customModule}', 'CustomModuleController@show');
Route::put('customModule/{customModule}', 'CustomModuleController@update');
Route::delete('customModule/{customModule}', 'CustomModuleController@destroy');

/*
|--------------------------------------------------------------------------
| Quotation line route
|--------------------------------------------------------------------------
*/
Route::get('quotationLines', 'QuotationLineController@index');
Route::post('quotationLine', 'QuotationLineController@store');
Route::get('quotationLine/{quotationLine}', 'QuotationLineController@show');
Route::put('quotationLine/{quotationLine}', 'QuotationLineController@update');
Route::delete('quotationLine/{quotationLine}', 'QuotationLineController@destroy');

/*
|--------------------------------------------------------------------------
| Supplier route
|--------------------------------------------------------------------------
*/
Route::get('suppliers', 'SupplierController@index');
Route::post('supplier', 'SupplierController@store');
Route::get('supplier/{supplier}', 'SupplierController@show');
Route::put('supplier/{supplier}', 'SupplierController@update');
Route::delete('supplier/{supplier}', 'SupplierController@destroy');
