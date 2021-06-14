<?php

use App\Http\Controllers\Admin\PlansController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resources([
        'plans' => PlansController::class
    ]);
});

Route::get('/', function () {
    return view('welcome');
});
