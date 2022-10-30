<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SPBEController;
use App\Http\Controllers\Admin\AspekController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Admin\ScheduleController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Route::get('home', [HomeController::class, 'home'])->name('home')->middleware('auth');
Route::get('home', [HomeController::class, 'home'])->name('home');
Route::post('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
Route::group(['prefix' => 'spbe', 'as' => 'spbe'], function() {
    Route::get('/', [SPBEController::class, 'index'])->name('spbe');
});

Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {

    Route::group(['prefix' => 'aspek', 'as' => 'aspek'], function() {
        Route::get('/', [AspekController::class, 'index'])->name('aspek');
    });

    Route::group(['prefix' => 'indikator', 'as' => 'indikator'], function() {
        Route::get('/', [IndikatorController::class, 'index'])->name('indikator');
    });

    Route::group(['prefix' => 'schedule', 'as' => 'schedule'], function() {
        Route::get('/', [ScheduleController::class, 'index'])->name('schedule');
    });

    //contoh  routing
    // Route::get('/', 'HomeController@index')->name('home');

    // Lang
    // Route::resource('language','LocalizationController')->name('language.index');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

});
