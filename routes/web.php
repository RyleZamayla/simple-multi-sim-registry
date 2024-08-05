<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'mainTable'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('dashboard/addProvider', [DashboardController::class, 'addProvider'])->name('addProvider');
    Route::patch('dashboard/{subscriber}', [DashboardController::class, 'updateSubscriber'])->name('updateSubscriber');
    Route::delete('dashboard/{subscriber}', [DashboardController::class, 'deleteSubscriber'])->name('deleteSubscriber');
    Route::patch('dashboard/{subscriber}/{provider}', [DashboardController::class, 'updateProvider'])->name('updateProvider');
    Route::delete('dashboard/{subscriber}/{provider}', [DashboardController::class, 'deleteProvider'])->name('deleteProvider');
    Route::post('dashboard/addSubscriber', [DashboardController::class, 'addSubscriber'])->name('addSubscriber');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
