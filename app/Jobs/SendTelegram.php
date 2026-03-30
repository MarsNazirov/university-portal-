<?php

namespace App\Jobs;

use App\Models\Application;
use App\Services\TelegramService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendTelegram implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Application $application;

    /**
     * Create a new job instance.
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Execute the job.
     */
    public function handle(TelegramService $telegram): void
    {
        $text = "Новая заявка!\n"  . 
                "Студент: " . $this->application->user->name . "\n" .
                "Факультет: " . $this->application->faculty->name . "\n" .
                "Баллы: " . $this->application->score;

        $telegram->sendMessage($text);
    }
}
