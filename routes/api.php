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

Route::namespace('V1')->prefix('v1')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::post('/login', 'AuthController@login');
        Route::post('/registration', 'AuthController@registration');
        Route::middleware('auth:sanctum')->group(function () {
            Route::Delete('/logout', 'AuthController@logout');
            Route::Delete('/logout-from-all-device', 'AuthController@logoutFromAllDevice');
        });
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('user')->group(function () {
            Route::get('/', function (Request $request) {
                return $request->user();
            });
        });
    });
});
