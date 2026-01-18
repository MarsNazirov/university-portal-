<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Faculty;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $faculties = Faculty::all();

        $applications = Application::with(['user', 'faculty'])
                ->filter($request->all())
                ->latest()
                ->paginate(10)
                ->withQueryString();

        return view('admin.dashboard', [
            'faculties' => $faculties,
            'applications' => $applications,
        ]);
    }
}
