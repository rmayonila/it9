<?php

use App\Http\Controllers\OldStudentController;
use App\Http\Controllers\TransfereeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Transferee routes
Route::get('/transferee', [TransfereeController::class, 'index'])->name('transferee.index');
Route::post('/transferee', [TransfereeController::class, 'store'])->name('transferee.store');

// Student Verification Routes
Route::get('/verify', [OldStudentController::class, 'verifyForm'])->name('verify.form');
Route::post('/verify', [OldStudentController::class, 'verifyStudent'])->name('verify');
Route::get('/old-student', [OldStudentController::class, 'showRegistrationForm'])->name('old-student');

// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [OldStudentController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [OldStudentController::class, 'admin.logout'])->name('admin.logout');
});

// Admin Authentication Routes
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
