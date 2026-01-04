<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;

Route::get('/', [FacultyController::class, 'index'])->name('home');
Route::get('/faculties/{faculty}/apply', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('/faculties/{faculty}/apply', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('/faculties/{faculty}', [FacultyController::class, 'show'])->name('faculties.show');

// Route::resource('faculties', FacultyController::class);
// Route::resource('applications', ApplicationController::class);

Route::patch('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Route::get('/faculties', function () {
//     return view('faculties/index');
// });