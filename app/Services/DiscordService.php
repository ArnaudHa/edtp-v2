<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordService {


    public function postMessage($message) : void
    {
        Http::post(config('app.discord_webhook'), [
            //'content' => "Learning how to send notifications with DevDojo.com!",
            'embeds' => [
                [
                    'title' => 'EDTP',
                    'description' => $message,
                    'color' => '1111111',
                ]
            ],
        ]);
    }


}
