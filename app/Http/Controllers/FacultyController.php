<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = Faculty::all();

        return view('faculties.index', [
            'faculties' => $faculties
        ]);

        
    }

    public function show(Faculty $faculty)
    {
        return view('faculties.show', [
            'faculty' => $faculty
        ]);
    }

    
}
