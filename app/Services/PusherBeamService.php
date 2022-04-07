<?php

namespace App\Services;

use Exception;
use Pusher\PushNotifications\PushNotifications;

class PusherBeamService {

    private $pushNotifications;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->pushNotifications = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAM_INSTANCE'),
            "secretKey" => env('PUSHER_BEAM_SECRET'),
        ));
    }

    public function sendNotification($interest, $title, $content)
    {
        $publishResponse = $this->pushNotifications->publish(
            [ $interest ],
            [
                'web' => [
                    'notification' => [
                        'title' => $title,
                        'body' => $content
                    ],
                ]
            ]
        );
    }
}
