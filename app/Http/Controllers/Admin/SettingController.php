<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index() : View {
        return view('admin.setting.general-setting');
    }

    public function updateGeneralSettings(Request $request) : RedirectResponse   {
        $data = $request->validate([
            'site_name'=> ['required'],
            'phone'=> ['nullable'],
            'email'=> ['nullable', 'email'],
            'location'=> ['nullable'],
            'default_currency' => ['required'],
            'currency_icon' => ['required'],
        ]);

         foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Cache::forget('settings');

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }
}
