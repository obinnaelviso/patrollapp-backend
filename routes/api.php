<?php

use App\Http\Controllers\CheckpointController;
use App\Http\Controllers\ClockingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Auth
Route::post('/auth', LoginController::class . '@login');
// Route::post('reset-password', ResetPasswordController::class . '@resetPassword');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', UserController::class . '@index');

    Route::get('sites', SiteController::class . '@index');

    Route::get('{site}/checkpoints', CheckpointController::class . '@index');

    Route::post('{checkpoint:checkpoint_no}/clock', ClockingController::class . '@clock');

    Route::post('/logout', LoginController::class . '@logout');
});