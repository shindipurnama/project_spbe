<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SPBEController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SKPDController;
use App\Http\Controllers\Admin\IndikatorController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PenilaianMandiriController;
use App\Http\Controllers\Admin\PenilaianMandiriSKPDController;
use App\Http\Controllers\Admin\HasilPenilaianMandiriController;
use App\Http\Controllers\Admin\DetailHasilPenilaianMandiriController;
use App\Http\Controllers\Admin\DomainController;
use App\Http\Controllers\Admin\AspekController;
use Illuminate\Support\Facades\Auth;
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
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
// Route::group(['prefix' => 'spbe', 'as' => 'spbe'], function() {
//     Route::get('/', [SPBEController::class, 'index'])->name('spbe');
// });

// Route::group(['prefix' => 'user-management', 'as' => 'user-management'], function () {
//     Route::get('/', [UserController::class, 'index'])->name('user-management');
// });

// Route::group(['prefix' => 'skpd', 'as' => 'skpd'], function () {
//     Route::get('/', [SKPDController::class, 'index'])->name('skpd');
// });

// Route::group(['prefix' => 'penilaian-mandiri', 'as' => 'penilaian-mandiri'], function () {
//     Route::get('/', [PenilaianMandiriController::class, 'index'])->name('penilaian-mandiri');
//     Route::get('/detail', [PenilaianMandiriController::class, 'detail'])->name('penilaian-mandiri-detail');
// });

// Route::group(['prefix' => 'admin', 'as' => 'admin'], function () {
    Route::delete('domain/destroy', 'DomainController@massDestroy')->name('domain.massDestroy');
    Route::resource('domain', DomainController::class);
    
    Route::delete('user-management/destroy', 'UserController@massDestroy')->name('user-management.massDestroy');
    Route::resource('user-management', UserController::class)->shallow();

    Route::delete('role/destroy', 'UserController@massDestroy')->name('role.massDestroy');
    Route::resource('role', RoleController::class)->shallow();

    Route::delete('aspek/destroy', 'AspekController@massDestroy')->name('aspek.massDestroy');
    Route::resource('aspek', AspekController::class);

    Route::delete('indikator/destroy', 'IndikatorController@massDestroy')->name('indikator.massDestroy');
    Route::resource('indikator', IndikatorController::class)->shallow();

    Route::delete('skpd/destroy', 'SKPDController@massDestroy')->name('skpd.massDestroy');
    Route::resource('skpd', SKPDController::class)->shallow();

    Route::delete('penilaian-mandiri/destroy', 'PenilaianMandiriController@massDestroy')->name('penilaian-mandiri.massDestroy');
    Route::resource('penilaian-mandiri', PenilaianMandiriController::class)->shallow();

    Route::delete('penilaian-mandiri-skpd/destroy', 'PenilaianMandiriController@massDestroy')->name('penilaian-mandiri-skpd.massDestroy');
    Route::resource('penilaian-mandiri-skpd', PenilaianMandiriSKPDController::class)->shallow();

    Route::delete('hasil-penilaian-mandiri/destroy', 'HasilPenilaianMandiriController@massDestroy')->name('hasil-penilaian-mandiri.massDestroy');
    Route::resource('hasil-penilaian-mandiri', HasilPenilaianMandiriController::class)->shallow();

    Route::delete('detail-hasil-penilaian-mandiri/destroy', 'HasilPenilaianMandiriController@massDestroy')->name('detail-hasil-penilaian-mandiri.massDestroy');
    Route::resource('detail-hasil-penilaian-mandiri', DetailHasilPenilaianMandiriController::class)->shallow();
// });



