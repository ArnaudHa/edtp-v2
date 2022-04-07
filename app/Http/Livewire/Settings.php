<?php

namespace App\Http\Livewire;

use App\Services\SettingsService;
use Livewire\Component;

class Settings extends Component
{
    public $theme;

    public function mount()
    {
        $settingsService = new SettingsService();
        $this->theme = $settingsService->get('theme');
    }

    public function render()
    {
        return view('livewire.settings');
    }

    public function update($theme)
    {
        $settingsService = new SettingsService();
        $this->theme = $theme;
        $settingsService->set('theme', $theme);

        return redirect(request()->header('Referer'));
    }
}
