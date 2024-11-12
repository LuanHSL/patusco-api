<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);

Route::post('/appointment', [AppointmentController::class, 'store']);

Route::middleware(['isReceptionist'])->group(function () {
    Route::get('/user/doctors', [UserController::class, 'getDoctors']);
    Route::group(['prefix' => 'appointment'], function () {
        Route::put('/{id}', [AppointmentController::class, 'update']);
        Route::get('', [AppointmentController::class, 'index']);
        Route::delete('', [AppointmentController::class, 'deleteAll']);
        Route::delete('/{id}', [AppointmentController::class, 'destroy']);
    });
});

Route::middleware(['isDoctor'])->group(function () {
    Route::group(['prefix' => 'appointment'], function () {
        Route::get('/getByUser', [AppointmentController::class, 'getByUser']);
        Route::put('/{id}/updateByUser', [AppointmentController::class, 'updateByUser']);
    });
});
