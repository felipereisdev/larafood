<?php

use App\Http\Controllers\Admin\PlansController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('plans/search', [PlansController::class, 'index'])
        ->name('plans.search');

    Route::resources([
        'plans' => PlansController::class
    ]);
});

Route::get('/', function () {
    return view('welcome');
});
