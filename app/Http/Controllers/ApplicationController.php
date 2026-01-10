<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\ApplicationRequest;
use App\Models\Application;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Auth::user()
            ->applications()
            ->with('faculty')
            ->latest()
            ->get();
        
        return view('applications.index', [
            'applications' => $applications
        ]);
    }

    public function create(Faculty $faculty)
    {
        return view('applications.create', [
            'faculty' => $faculty
        ]);
    }

    public function store(ApplicationRequest $request, Faculty $faculty)
    {
        $data = $request->validated();

        $faculty->applications()->create([
            'user_id' => Auth::user()->id,
            'score' => $data['score'],
            'message' => $data['message']
        ]);

        return redirect()->route('home');
    }

    public function destroy(Application $application)
    {
        $application->delete();
        
        return redirect()->back();
    }

    public function update(Request $request, Application $application)
    {
        $status = $request->input('status');
        
        $application->update([
            'status' => $status
        ]);

        return redirect()->back();
    }
}
