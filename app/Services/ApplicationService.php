<?php 

namespace App\Services;

use App\Jobs\SendTelegram;
use App\Models\Application;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class ApplicationService
{
    public function createApplication(Faculty $faculty, int $userId, array $data): Application
    {
        return DB::transaction(function () use ($faculty, $userId, $data) {
            $application = $faculty->applications()->create([
                'user_id' => $userId,
                'score' => $data['score'],
                'message' => $data['message']
            ]);

            SendTelegram::dispatch($application);

            return $application;
        });
    }
}