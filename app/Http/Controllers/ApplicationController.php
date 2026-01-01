<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create(Faculty $faculty)
    {
        return view('applications.create', [
            'faculty' => $faculty
        ]);
    }
}
