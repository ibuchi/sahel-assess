<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::controller(AuthenticatedSessionController::class)->group(function () {
        Route::post('/login', 'store');
        Route::post('/logout', 'destroy')->name('logout')->middleware(['auth:sanctum']);
    });
});

Route::resource('countries', CountryController::class)->only(['index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResources([
        'companies' => CompanyController::class,
        'services' => ServiceController::class
    ]);

    Route::get('all-companies', [CompanyController::class, 'allCompanies'])
        ->withoutMiddleware(['auth:sanctum']);

    Route::post('/profile', [ProfileController::class, 'update']);
    Route::get('/profile', [ProfileController::class, 'index']);
});
