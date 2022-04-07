<?php

namespace App\Http\Livewire;

use App\Services\SettingsService;
use Livewire\Component;

class Root extends Component
{
    public $theme;

    public function mount()
    {
        $settingsService = new SettingsService();
        $this->theme = $settingsService->get('theme');
    }

    public function render()
    {
        return view('livewire.root')
            ->layoutData([ 'theme' => $this->theme ]);
    }
}
