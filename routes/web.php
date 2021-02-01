<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '网站主页';
});

Route::fallback(function () {
    return view('app');
});
