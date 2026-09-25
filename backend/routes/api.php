<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::middleware('throttle:6,1')->group(function () {
        Route::post('register', [AuthController::class, 'register'])->name('register');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('workouts')->group(function () {
        Route::get('/', [WorkoutController::class, 'index'])->name('workouts.index');
        Route::post('/', [WorkoutController::class, 'store'])->name('workouts.store');
        Route::get('/{workout}', [WorkoutController::class, 'show'])->name('workouts.show')->can('view', 'workout');
        Route::put('/{workout}', [WorkoutController::class, 'update'])->name('workouts.update')->can('update', 'workout');
        Route::delete('/{workout}', [WorkoutController::class, 'destroy'])->name('workouts.destroy')->can('delete', 'workout');
    });
});
