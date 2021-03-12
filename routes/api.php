<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Api\AuthController::class, 'login']);
Route::get('captcha', [\App\Api\CaptchaController::class, 'create']);
Route::get('user/info', [\App\Api\UserController::class, 'info']);
Route::put('user/password/{user}', [\App\Api\UserController::class, 'password']);

Route::apiResource('user', \App\Api\UserController::class);
Route::get('site/current', [\App\Api\SiteController::class, 'current']);
Route::apiResource('site', \App\Api\SiteController::class);
Route::apiResource('package', \App\Api\PackageController::class);
Route::apiResource('system/config', \App\Api\SystemConfigController::class)->only(['store', 'show']);;
Route::post('upload/local', [\App\Api\UploadController::class, 'local']);
Route::apiResource('system_config', \App\Api\SystemConfigController::class);
Route::apiResource('group', \App\Api\GroupController::class);
Route::apiResource('group_package', \App\Api\GroupPackageController::class);
Route::apiResource('module', \App\Api\ModuleController::class)->scoped(['module' => 'name']);
