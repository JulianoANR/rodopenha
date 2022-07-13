<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ServiceOrderController,
    VehicleController,
    FinanceController
};

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

Route::redirect('/', '/dashboard')->name('index');
Route::view('/components', 'pages.componentsCSS')->name('components');

Route::middleware(['auth'])->group( function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/update', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('/service-orders')->group(function () {
        Route::get('/', [ServiceOrderController::class, 'index'])->name('service-orders.index');
        Route::get('/create', [ServiceOrderController::class, 'create'])->name('service-orders.create');
        Route::post('/store', [ServiceOrderController::class, 'store'])->name('service-orders.store');
        Route::get('/edit/id', [ServiceOrderController::class, 'edit'])->name('service-orders.edit');
        Route::put('/update/{id}', [ServiceOrderController::class, 'update'])->name('service-orders.update');
        Route::get('/{id}', [ServiceOrderController::class, 'show'])->name('service-orders.show');
    });

    Route::prefix('/settings')->group(function () {
        Route::view('/account', 'pages.settings.account')->name('settings.account_data');
        Route::view('/preferences', 'pages.settings.preferences')->name('settings.preferences');
        Route::view('/company', 'pages.settings.company')->name('settings.company_data');
        Route::view('/terms', 'pages.settings.company_terms')->name('settings.company_terms');
    });

    Route::prefix('/vehicles')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('vehicles.index');
        Route::get('/create', [VehicleController::class, 'create'])->name('vehicles.create');
        Route::post('/store', [VehicleController::class, 'store'])->name('vehicles.store');
    });

    Route::prefix('/trips')->group(function () {
        Route::view('/', 'pages.trips.index')->name('trips.index');
    });

    Route::prefix('/finance')->group(function () {
        Route::get('/', [FinanceController::class, 'dashboard'])->name('finance.dashboard');
    });
});

require __DIR__.'/get.php';
require __DIR__.'/auth.php';
