<?php

use App\Http\Controllers\AnalyticsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('analytics')->group(function () {
    Route::get('monthly-sales-trend', [AnalyticsController::class, 'monthlySalesTrend']);
    Route::get('profit-summary', [AnalyticsController::class, 'profitSummary']);
    Route::get('top-products', [AnalyticsController::class, 'topSellingProducts']);
    Route::get('country-comparison', [AnalyticsController::class, 'salesByCountry']);
});


