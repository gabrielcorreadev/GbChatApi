<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Account\DeviceController;
use App\Http\Controllers\Api\V1\Account\AccountController;

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

Route::post('auth/login', [AccountController::class, 'login']);
Route::post('auth/signup', [AccountController::class, 'signup']);

Route::group(['middleware' => ['auth:api'], 'prefix' => 'auth'], function ($router) {
    Route::post('/logout', [AccountController::class, 'logout']);
    Route::get('/me', [AccountController::class, 'me']);
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'devices'], function ($router) {
    Route::get('/', [DeviceController::class, 'all_devices']);
    Route::post('/logout-all', [DeviceController::class, 'logout_all_devices']); // Remove all logged-in devices, except the current device.
    Route::post('/{id}/logout', [DeviceController::class, 'logout_device']); // Logout a specific device using its session
});

