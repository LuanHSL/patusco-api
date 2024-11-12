<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);

Route::middleware(['isReceptionist'])->group(function () {
    Route::get('/user/doctors', [UserController::class, 'getDoctors']);
});

Route::middleware(['isDoctor'])->group(function () {
    // TODO implement doctor routes
});
