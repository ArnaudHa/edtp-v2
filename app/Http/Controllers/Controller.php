<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Pusher\PushNotifications\PushNotifications;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @throws Exception
     */
    public function test()
    {
        $pushNotifications = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAM_INSTANCE'),
            "secretKey" => env('PUSHER_BEAM_SECRET'),
        ));
    }
}
