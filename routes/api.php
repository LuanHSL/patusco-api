<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);

Route::post('/appointment', [AppointmentController::class, 'store']);

Route::middleware(['isReceptionist'])->group(function () {
    Route::get('/user/doctors', [UserController::class, 'getDoctors']);
    Route::group(['prefix' => 'appointment'], function () {
        Route::put('/{id}', [AppointmentController::class, 'update']);
        Route::get('', [AppointmentController::class, 'index']);
        Route::get('/{id}', [AppointmentController::class, 'show']);
        Route::delete('/{id}', [AppointmentController::class, 'destroy']);
    });
});

Route::middleware(['isDoctor'])->group(function () {
    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/all/getByUser', [AppointmentController::class, 'getByUser']);
        Route::get('/{id}/showByUser', [AppointmentController::class, 'showByUser']);
        Route::put('/{id}/updateByUser', [AppointmentController::class, 'updateByUser']);
    });
});
