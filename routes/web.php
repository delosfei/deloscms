<?php

use App\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return '网站主页';
    }
);

Route::get(
    'login',
    function () {
        return view('app');
    }
)->middleware(['front']);


//后备路由（没有可匹配路由时执行这里）
Route::fallback(
    function () {
        return view('app');
    }
);
