<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/application', [ApplicationController::class, 'index'])->name('application.index');
    Route::get('/application/create', [ApplicationController::class, 'store'])->name('application.create');
    Route::post('/application/create', [ApplicationController::class, 'create'])->name('application.create');

    Route::get('/admin/application', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/admin/application/update/{id}', [AdminController::class, 'update'])->name('admin.update');
});


require __DIR__.'/auth.php';
