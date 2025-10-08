<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadActivityController;

Route::get('/', function () {
    return redirect()->route('leads.index');
});

Route::resource('leads', LeadController::class);
Route::post('leads/{lead}/activities', [LeadActivityController::class, 'store'])
    ->name('leads.activities.store');
