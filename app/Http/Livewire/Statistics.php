<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Statistics extends Component
{
    public $stats;

    public function mount()
    {
        $stats = Course::query()
            ->select('code', 'desc', DB::raw('count(*) as remaining'))
            ->groupBy([ 'code', 'desc' ])
            ->get();
    }

    public function render()
    {
        $courses = Course::query()
            ->select('code', 'desc', DB::raw('count(*) as remaining'))
            ->groupBy([ 'code', 'desc' ])
            ->where('date', '>=', Carbon::now()->toDateString())
            ->get();

        return view('livewire.statistics', [
            'courses' => $courses
        ]);
    }
}
