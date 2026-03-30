<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\ApplicationRequest;
use App\Jobs\SendEmail;
use App\Models\Application;
use App\Models\Faculty;
use App\Services\ApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function store(ApplicationRequest $request, ApplicationService $service, Faculty $faculty )
    {
        $data = $request->validated();

        try {
            $service->createApplication($faculty, Auth::user()->id, $data);
        } catch (\Exception $e) {
            Log::error('Ошибка создания заявки: ' . $e->getMessage());

            return back()->with('error', 'Неудалось создать заявку. Попробуйте позже.');
        }

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

        SendEmail::dispatch($application);

        return redirect()->back();
    }
}
