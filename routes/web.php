<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/bureau-etudes', [AboutController::class, 'bureauEtudes'])->name('bureau-etudes');
Route::get('/production-terrain', [AboutController::class, 'productionTerrain'])->name('production-terrain');
