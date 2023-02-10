<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/create', [DashboardController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard.store');
Route::delete('/dashboard/{post}/delete', [DashboardController::class, 'delete'])->middleware(['auth', 'verified'])->name('dashboard.delete');
Route::get('/dashboard/{post}/edit', [DashboardController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.edit');
Route::put('/dashboard/{post}/update', [DashboardController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
