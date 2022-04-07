<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Notifications\PlanningUpdated;
use App\Services\DiscordService;
use App\Services\PlanningService;
use App\Services\PusherBeamService;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Devtools extends Component
{
    public function render()
    {
        return view('livewire.devtools');
    }

    public function testNotification()
    {
        $service = new PusherBeamService();
        $service->sendNotification();
    }

    public function testDiscord()
    {
        $service = new DiscordService();
        $service->postMessage();
    }

    public function clearDatabase()
    {
        Course::query()->delete();
    }

    public function synchronize()
    {
        $service = new PlanningService();
        $service->synchronize();
    }
}
