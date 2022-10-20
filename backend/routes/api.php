<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//api/v1

Route::group(['prefix' => 'v1', 'namespace'=> 'App\Http\Controllers\Api\V1'], function (){
    Route::apiResource('drivers', DriverController::class);
    Route::apiResource('vehicles', VehicleController::class);
    Route::apiResource('assignations', VehicleDriverController::class);
});

//Route::post('test', 'App\Http\Controllers\Api\V1\VehicleDriverController@store');
