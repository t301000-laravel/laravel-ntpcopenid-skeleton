<?php

use Illuminate\Support\Facades\Route;
use T301000\LaravelNtpcOpenid\Controllers\NTPCOpenIDController;

Route::group(
    [
        'middleware' => ['guest'],
        'prefix' => config('ntpcopenid.prefix'),
        'as' => 'ntpcopenid.login.',
    ],
    function() {
        Route::post('login', [NTPCOpenIDController::class, 'startOpenID'])->name('start'); // 啟動 OpenID 認證流程
        Route::get('login', [NTPCOpenIDController::class, 'process'])->name('back'); // OpenID 導回
        Route::get('check', [NTPCOpenIDController::class, 'loginCheck'])->name('check'); // 檢查是否允許登入
    }
);
