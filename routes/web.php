<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    UserController,
    TruckController,
    FinanceController,

    ServiceOrderController,
    VehicleController,
    PickupController,
    DeliveryController,
    PaymentController,
    ShipperController
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
        Route::put('/{id}', [ServiceOrderController::class, 'update'])->name('service-orders.update');
        Route::get('/{id}', [ServiceOrderController::class, 'show'])->name('service-orders.show');
        Route::delete('/{id}', [ServiceOrderController::class, 'destroy'])->name('service-orders.destroy');

        Route::patch('/{id}/assign', [ServiceOrderController::class, 'assign'])->name('service-orders.assign');
        Route::patch('/{id}/unassign', [ServiceOrderController::class, 'unassign'])->name('service-orders.unassign');
    });

    /**
     * Rotas de relações das ORDENS DE SERVIÇO
     */
    Route::post('/vehicles/{idServiceOrder}', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::put('/vehicles/{idVehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/vehicles/{idVehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::put('/pickup/{idPickup}', [PickupController::class, 'update'])->name('pickup.update');
    Route::put('/delivery/{idDelivery}', [DeliveryController::class, 'update'])->name('delivery.update');
    Route::put('/payment/{idPayment}', [PaymentController::class, 'update'])->name('payment.update');
    Route::put('/shipper/{idShipper}', [ShipperController::class, 'update'])->name('shipper.update');


    Route::prefix('/settings')->group(function () {
        Route::view('/account', 'pages.settings.account')->name('settings.account_data');
        Route::view('/preferences', 'pages.settings.preferences')->name('settings.preferences');
        Route::view('/company', 'pages.settings.company')->name('settings.company_data');
        Route::view('/terms', 'pages.settings.company_terms')->name('settings.company_terms');
    });

    Route::prefix('/trucks')->group(function () {
        Route::get('/', [TruckController::class, 'index'])->name('trucks.index');
        Route::get('/create', [TruckController::class, 'create'])->name('trucks.create');
        Route::post('/store', [TruckController::class, 'store'])->name('trucks.store');
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
