<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SettingController extends Controller
{
    use FileUpload;

    /**-----------------------------------------------
     * General settings
     *-------------------------------------------------*/
    public function index(): View
    {
        return view('admin.setting.general-setting');
    }

    public function updateGeneralSetting(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_name' => ['required'],
            'phone' => ['nullable'],
            'email' => ['nullable', 'email'],
            'location' => ['nullable'],
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

    /**-----------------------------------------------
     * Commission settings
     *-------------------------------------------------*/
    public function commissionSetting(): View
    {
        return view('admin.setting.commission-settings');
    }

    public function updateCommissionSetting(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'commission_rate' => ['required', 'numeric'],
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Cache::forget('settings');

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }

    public function smptSetting(): View
    {
        return view('admin.setting.smpt-settings');
    }

    public function updateSmtpSetting(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'sender_email' => 'required|email|max:255',
            'receiver_email' => 'required|email|max:255',
            'mail_mailer' => 'required|string|max:255',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|numeric',
            'mail_username' => 'required|string|max:255',
            'mail_password' => 'required|string|max:255',
            'mail_encryption' => 'required|string|max:255',
            'mail_queue' => 'required|string|in:1,0',
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Cache::forget('settings');

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }

    public function logoSetting(): View
    {

        return view('admin.setting.logo-setting');
    }

    public function updateLogoSetting(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'site_logo' => 'nullable|image|max:3000',
            'site_footer_logo' => 'nullable|image|max:3000',
            'site_favicon' => 'nullable|image|max:3000',
            'site_breadcrumb' => 'nullable|image|max:3000',
        ]);

        if ($request->hasFile('site_logo')) {
            $data['site_logo'] = $this->uploadFile($request->file('site_logo'));
            $this->deleteFile(config('settings.site_logo'));
        }

        if ($request->hasFile('site_footer_logo')) {
            $data['site_footer_logo'] = $this->uploadFile($request->file('site_footer_logo'));
            $this->deleteFile(config('settings.site_footer_logo'));
        }

        if ($request->hasFile('site_favicon')) {
            $data['site_favicon'] = $this->uploadFile($request->file('site_favicon'));
            $this->deleteFile(config('settings.site_favicon'));
        }

        if ($request->hasFile('site_breadcrumb')) {
            $data['site_breadcrumb'] = $this->uploadFile($request->file('site_breadcrumb'));
            $this->deleteFile(config('settings.site_breadcrumb'));
        }

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        Cache::forget('settings');

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }
}
