<?php

use App\Http\Controllers\LocationController;
use App\Http\Middleware\RateLimitMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('location.Index');
});

Route::get('/create-route', function () {
    return view('route.Index');
});

Route::middleware([RateLimitMiddleware::class])->prefix('location')->group(function () {
    Route::post('get', [LocationController::class, 'get']);
    Route::post('list', [LocationController::class, 'list']);
    Route::post('create', [LocationController::class, 'create']);
    Route::post('update', [LocationController::class, 'update']);
    Route::post('delete', [LocationController::class, 'delete']);
    Route::post('dataTable', [LocationController::class, 'dataTable']);
});
