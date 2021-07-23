<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Account\DeviceManagerController;

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

Route::group(['middleware' => ['auth:api'], 'prefix' => 'devices'], function ($router) {
    Route::get('/', [DeviceManagerController::class, 'all_devices']);
    Route::post('/logout-all', [DeviceManagerController::class, 'logout_all_devices']); // Remove all logged-in devices, except the current device.
    Route::post('/{id}/logout', [DeviceManagerController::class, 'logout_device']); // Logout a specific device using its session
});

