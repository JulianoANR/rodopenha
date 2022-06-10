<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ServiceOrderController
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/components', function () {
    return view('componentsCSS');
})->name('components');

Route::middleware(['auth'])->group( function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

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
        Route::get('/edit/{id}', [ServiceOrderController::class, 'edit'])->name('service-orders.edit');
        Route::post('/update', [ServiceOrderController::class, 'update'])->name('service-orders.update');
    });

    Route::prefix('settings')->group(function () {
        Route::view('/account', 'settings.account')->name('settings.account_data');
        Route::view('/preferences', 'settings.preferences')->name('settings.preferences');
        Route::view('/company', 'settings.company')->name('settings.company_data');
    });

});


require __DIR__.'/auth.php';
