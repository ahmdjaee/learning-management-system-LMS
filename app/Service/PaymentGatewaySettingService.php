<?php

namespace App\Service;

use App\Models\PaymentSetting;
use Illuminate\Support\Facades\Cache;

class PaymentGatewaySettingService
{

    /**
     * get all payment gateway setting and store in cache
     * @return array
     */
    public function getSettings(): array
    {
        return Cache::rememberForever('gatewaySettings', function () {
            return PaymentSetting::pluck('value', 'key')->toArray(); //['key', 'value']
        });
    }

    /**
     * set the settings in config
     * @return void
     */
    public function setGlobalSettings()
    {
        $settings = $this->getSettings();
        config()->set('gateway_settings', $settings);
    }
}
