<?php

use App\Http\Controllers\OldStudentController;
use App\Http\Controllers\TransfereeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transferee', function () {
    return view('transferee');
});

Route::post('/submit-transferee', [TransfereeController::class, 'submit']);


Route::get('/old-student', function () {
    return view('old-student');
});

Route::post('/old-student-login', [OldStudentController::class, 'login']);


Route::post('/submit-transferee', [TransfereeController::class, 'store']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [OldStudentController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [OldStudentController::class, 'logout'])->name('logout');
});

// Add this with your other routes
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

// ..

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});