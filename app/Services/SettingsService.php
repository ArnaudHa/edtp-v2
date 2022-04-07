<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

class SettingsService {

    private $settings;

    public function __construct()
    {
        $rawCookie = Cookie::get('config');
        if($rawCookie !== null) {
            $this->settings = json_decode($rawCookie, JSON_OBJECT_AS_ARRAY);
        } else {
            $this->settings = [
                'theme' => 'classic',
                'notifications' => false,
            ];
        }

        Cookie::queue('config', json_encode($this->settings));
    }

    public function getAll()
    {
        return $this->settings;
    }

    public function get($key)
    {
        return $this->settings[$key];
    }

    public function set($key, $value): void
    {
        $this->settings[$key] = $value;
        Cookie::queue('config', json_encode($this->settings));
    }

}
