<?php

namespace App\Listeners;

use App\Events\CourseUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class CourseUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CourseUpdated  $event
     * @return void
     */
    public function handle(CourseUpdated $event)
    {
        $url = "https://discord.com/api/webhooks/912983540533198869/ofbZUCZWoRBsWiPol1rAk9OKPiYwwoFPTlNR8N2r2FsGDdKVxi6NWRm3kaKFlhEaFDtp";

        $params = [
            'username' => 'EDTP BOT',
            'embeds' => [
                'title' => 'Changement informations du cours',
                'description' => 'Truc a changé',
                'timestamp' => Carbon::now()->toIso8601String()
            ]
        ];

        Http::post($url, $params);
    }
}
