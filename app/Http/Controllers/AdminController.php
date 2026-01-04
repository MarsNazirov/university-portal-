<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $applications = Application::with(['user', 'faculty'])->latest()->paginate(5);

        return view('admin.dashboard', [
            'applications' => $applications
        ]);
    }

    
}
