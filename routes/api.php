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

        // Get distance by 1 or multiple devices
        Route::get('/distance', [App\Http\Controllers\Api\DeviceController::class, 'distance']);

        // Get device's coordinates
        Route::get('/field', [App\Http\Controllers\Api\DeviceController::class, 'field']);

        // Get dimensions
        Route::get('/dimensions', [App\Http\Controllers\Api\DeviceController::class, 'dimensions']);


        // Time
        // Set time
        Route::post('/time', [App\Http\Controllers\Api\TimeController::class, 'store']);

        // Match
        // Set match's dates
        Route::post('/match', [App\Http\Controllers\Api\MatchController::class, 'store']);

        // Field
        // Set field
        Route::post('/field', [App\Http\Controllers\Api\FieldController::class, 'store']);

        // Battery
        // Set battery
        Route::post('/battery', [App\Http\Controllers\Api\BatteryController::class, 'store']);

        // Coordinate
        // Set device's coordinate
        Route::post('/coordinate', [App\Http\Controllers\Api\CoordinateController::class, 'store']);
    }
);