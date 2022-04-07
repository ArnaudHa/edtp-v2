<?php

namespace App\Http\Controllers;

use App\Services\GalaoService;
use App\Services\PlanningService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class EdtController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function get(): void
    {

    }

    public function getToday(PlanningService $planningService)
    {
        return response()->json($planningService->getCoursesByDate(Carbon::now()->toDateString()));
    }

    public function getLastSyncDate(): void
    {

    }

    public function sync(PlanningService $planningService): void
    {
        $planningService->synchronize();
    }

    public function test(PlanningService $planningService): void
    {
        $planningService->synchronize();
    }
}
