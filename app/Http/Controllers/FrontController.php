<?php

namespace App\Http\Controllers;

use App\Services\PlanningService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FrontController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function planning(PlanningService $planningService)
    {
        return view('planning', [ 'courses' => $planningService->getCoursesByDate(Carbon::now()->toDateString()) ]);
    }
}
