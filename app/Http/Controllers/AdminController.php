<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $faculties = Faculty::all();

        $query = Application::with(['user', 'faculty']);

        if ($request->filled('status')) {
            $query->where('status', '=', $request->input('status'));
        }

        if ($request->filled('faculty_id')) {
            $query->where('faculty_id', '=', $request->input('faculty_id'));
        }

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', "%" . $request->input('search') . "%");
            });
        }

        $applications = $query->latest()->paginate(10)->withQueryString();

        return view('admin.dashboard', [
            'faculties' => $faculties,
            'applications' => $applications,
        ]);
    }

    
}
