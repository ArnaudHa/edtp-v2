<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $format;
    public $date;

    public $days;


    public function mount()
    {
        $this->days = [];
        $tool = Carbon::now();
        for($i = 0; $i <= 100; $i++) {
            $this->days[] = [
                'date' => $tool->toDateString(),
                'day' => $tool->isoFormat('dddd'),
            ];
            $tool->addDay();
        }
        $collection = collect($this->days);
        $chunks = $collection->chunk(7);
        $this->days = $chunks->toArray();
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
