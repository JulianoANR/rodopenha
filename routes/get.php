<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\{
    UserController,
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register your internal routes intended
| to return asynchronous data within the application.
|
*/

Route::middleware(['auth'])->group( function () {
    Route::prefix('/get')->group(function () {
        Route::get('/users', [UserController::class, 'dataUsers'])->name('get.users');
    });
});
