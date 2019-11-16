<?php

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

Route::post('/rfid/{id}', 'API\RfidController@store');
Route::post('/push', 'API\PushController@store');

Route::get('/tools', 'API\ToolController@index');
Route::get('/checklist', 'API\ChecklistController@show');
