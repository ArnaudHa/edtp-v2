<?php

namespace App\Http\Livewire;

use App\Services\PlanningService;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Planning extends Component
{
    public $courses;
    public $date;

    public function mount()
    {
        $this->date = Carbon::now()->toDateString();
        $this->updateCourses();
    }

    private function updateCourses()
    {
        $planningService = new PlanningService();
        $this->courses = $planningService->getCoursesByDate($this->date);
    }

    public function nextDay()
    {
        $this->date = Carbon::parse($this->date)->addDay()->toDateString();
        $this->updateCourses();
    }

    public function previousDay()
    {
        $this->date = Carbon::parse($this->date)->subDay()->toDateString();
        $this->updateCourses();
    }

    public function render()
    {
        return view('livewire.planning');
    }
}
