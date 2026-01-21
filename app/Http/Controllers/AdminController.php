<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Faculty;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // $faculties = Faculty::all();

        $faculties = Cache::remember('faculties_list', 3600, function () {
            return Faculty::all();
        });

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

    public function downloadPdf(Application $application)
    {
        $pdf = Pdf::loadView('pdf.enrollment', [
            'application' => $application
        ]);

        return $pdf->download('order-' . $application->id . '.pdf');
    }
}
