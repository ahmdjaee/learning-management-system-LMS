<?php

namespace App\Service;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    /**
     * get all payment gateway setting and store in cache
     * @return array
     */
    public function getSettings(): array
    {
        return Cache::rememberForever('settings', function () {
            return Setting::pluck('value', 'key')->toArray(); //['key', 'value']
        });
    }

    /**
     * set the settings in config
     * @return void
     */
    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('settings', $settings);
    }
}
