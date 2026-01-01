<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;

Route::get('/', [FacultyController::class, 'index'])->name('home');
Route::get('/faculties/{faculty}/apply', [ApplicationController::class, 'create'])->name('applications.create');
Route::get('/faculties/{faculty}', [FacultyController::class, 'show'])->name('faculties.show');


Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Route::get('/faculties', function () {
//     return view('faculties/index');
// });