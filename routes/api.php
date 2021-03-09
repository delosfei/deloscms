<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Api\AuthController::class, 'login']);
Route::get('captcha', [\App\Api\CaptchaController::class, 'create']);
Route::get('user/info', [\App\Api\UserController::class, 'info']);
Route::apiResource('user', \App\Api\UserController::class);
