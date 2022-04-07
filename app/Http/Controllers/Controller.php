<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @throws Exception
     */
    public function test()
    {

        $stats = Course::query()
            ->select('code')
            ->groupBy('code')
            ->count('code');

        $test = Course::query()
            ->select('code', 'desc', DB::raw('count(*) as remaining'))
            ->groupBy([ 'code', 'desc' ])
            ->get();

        dd($stats, $test);
    }
}
