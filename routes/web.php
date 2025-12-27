<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('faculties/index');
});

Route::get('/admin', function () {
    return view('admin/dashboard');
});

// Route::get('/faculties', function () {
//     return view('faculties/index');
// });