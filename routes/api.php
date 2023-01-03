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


Route::group(['prefix' => 'auth'], function(){

        // Get devices' info.
        Route::get('/devices', [App\Http\Controllers\Api\DeviceController::class, 'devices']);

        // Get device's position.
        Route::get('/location/{id}', [App\Http\Controllers\Api\DeviceController::class, 'location']);

        // Get multiple locations.
        Route::get('/location', [App\Http\Controllers\Api\DeviceController::class, 'multipleLocation']);

        // Get device's battery level.
        Route::get('/battery/{id}', [App\Http\Controllers\Api\DeviceController::class, 'battery']);

    }
);