<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DiscordService {


    public function postMessage() : void
    {
        Http::post(env('DISCORD_WEBHOOK'), [
            //'content' => "Learning how to send notifications with DevDojo.com!",
            'embeds' => [
                [
                    'title' => 'coucou',
                    'description' => "Discord Webhooks are great!",
                    'color' => '1111111',
                ]
            ],
        ]);
    }


}
