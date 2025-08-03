<?php

use App\Http\Controllers\Api\V1\ActivityController;
use App\Http\Controllers\Api\V1\BuildingController;
use App\Http\Controllers\Api\V1\OrganizationController;

use App\Http\Middleware\AuthApi;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')
    ->middleware(AuthApi::class)
    ->group(function () {

        // Search
        Route::get('/organizations/search', [OrganizationController::class, 'search']);
        Route::get('/organizations/nearby', [OrganizationController::class, 'nearby']);

        // Organizations
        Route::get('/organizations/{id}', [OrganizationController::class, 'show']);
        Route::get('/organizations', [OrganizationController::class, 'index']);

        // Buildings
        Route::get('/buildings/{id}/organizations', [BuildingController::class, 'organizations']);
        Route::get('/buildings/{id}', [BuildingController::class, 'show']);
        Route::get('/buildings', [BuildingController::class, 'index']);

        // Activities
        Route::get('/activities/{id}/organizations', [ActivityController::class, 'organizations']);
        Route::get('/activities/{id}', [ActivityController::class, 'show']);
        Route::get('/activities/', [ActivityController::class, 'index']);

    });
