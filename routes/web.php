<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

Route::get('/', [FacultyController::class, 'index'])->name('home');
Route::get('/faculties/{faculty}/apply', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/faculties/{faculty}/apply', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/faculties/{faculty}', [FacultyController::class, 'show'])->name('faculties.show');

Route::middleware(['auth', 'can:view-admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::patch('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
    Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
});

Route::get('/my-applications', [ApplicationController::class, 'index'])->name('applications.index')->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'create'])->name('login.create');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'logout'])->name('login.logout');

// Route::get('/faculties', function () {
//     return view('faculties/index');
// });