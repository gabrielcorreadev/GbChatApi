<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Api\V1\Account\DeviceController;
use App\Http\Controllers\Api\V1\Account\AccountController;
use App\Http\Controllers\Api\V1\Account\VerificationController;
use App\Http\Controllers\Api\V1\User\UserController;
use App\Http\Controllers\Api\V1\Upload\PhotoUploadController;
use App\Http\Controllers\Api\V1\Follower\FollowerController;

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

Route::get('email/verify/{id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::group(['middleware' => ['auth:api'], 'prefix' => 'auth'], function ($router) {
    Route::post('/logout', [AccountController::class, 'logout']);
    Route::get('/me', [AccountController::class, 'me']);
    Route::put('/change-name', [AccountController::class, 'update_name']);
    Route::put('/change-email', [AccountController::class, 'update_email']);
    Route::put('/change-phone', [AccountController::class, 'update_phone']);
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'devices'], function ($router) {
    Route::get('/', [DeviceController::class, 'all_devices']);
    Route::post('/logout-all', [DeviceController::class, 'logout_all_devices']); // Remove all logged-in devices, except the current device.
    Route::post('/{id}/logout', [DeviceController::class, 'logout_device']); // Logout a specific device using its session
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'users'], function ($router) {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/nearby-location', [UserController::class, 'get_list_nearby_users']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}/change-name', [UserController::class, 'update_name']);
    Route::put('/{id}/change-email', [UserController::class, 'update_email']);
    Route::put('/{id}/change-phone', [UserController::class, 'update_phone']);
    Route::post('/{id}/follow', [UserController::class, 'follow_user']);
    Route::post('/{id}/unfollow', [UserController::class, 'unfollow_user']);
    Route::get('/{id}/followers', [UserController::class, 'followers']);
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'user'], function ($router) {
    Route::post('/upload-profile', [PhotoUploadController::class, 'upload_profile']); 
    Route::post('/remove-profile', [PhotoUploadController::class, 'remove_photo']); 
});

