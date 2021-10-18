<?php

    use App\Http\Controllers\Auth\AuthController;
    use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'guest'], function () {
    Route::view('login', 'login')->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::get('ntpc-login', [AuthController::class, 'loginByNTPCOpenID']);
});

Route::group(['middleware' => 'auth'], function () {
   Route::get('profile', [AuthController::class, 'profile'])->name('profile');
   Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

require __DIR__ . '/ntpcopenid.php';
