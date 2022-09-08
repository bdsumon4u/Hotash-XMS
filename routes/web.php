<?php

use Illuminate\Http\Request;
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

Route::middleware('splade')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    require __DIR__.'/auth.php';
});

Route::any('/services/register-device.php', function (Request $request) {
    info('URL: '.$request->url());
});

Route::any('/services/sign-in.php', function (Request $request) {
    info('URL: '.$request->url());
});

Route::any('/ajax/login-form.php', function (Request $request) {
    info('URL: '.$request->url());
});

Route::any('/ajax/register-user.php', function (Request $request) {
    info('URL: '.$request->url());
});

Route::any('{any}', function (Request $request) {
    info('URL: '.$request->url());
})->where('any', '.*');
