<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Models\Faculty;
use App\Services\ApplicationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\FuncCall;

class ApplicationController extends Controller
{
    public function index()
    { 
        
        $user = Auth::user();

        if ($user->is_admin == 1) {
            $applications = Application::with(['user', 'faculty'])->get();
        } else {
            $applications = $user->applications()->with('faculty')->get();
        }

        return ApplicationResource::collection($applications);
    }

    public function store(ApplicationRequest $request, ApplicationService $service)
    {
        $data = $request->validated();

        $faculty = Faculty::findOrFail($request->input('faculty_id'));

        try {
            $application = $service->createApplication($faculty, Auth::user()->id, $data);

            return response()->json([
            'message' => 'Заявка успешно создана',
            'application_id' => $application->id
            ], 201);
        } catch (\Exception $e) {
            Log::error('API Error: ' . $e->getMessage());

            return response()->json([
                'error' => 'Ошибка Сервера'
            ], 500);
        }
    }
}
