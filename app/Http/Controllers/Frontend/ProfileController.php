<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Http\Requests\Frontend\SocialUpdateRequest;
use App\Http\Requests\Frontend\UpdatePasswordRequest;
use App\Models\InstructorPayoutInformation;
use App\Models\PayoutGateway;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use FileUpload;
    public function studentIndex(): View
    {
        return view('frontend.student-dashboard.profile.index');
    }

    public function instructorIndex(): View
    {
        $gateways = PayoutGateway::where('status', 1)->get();

        return view('frontend.instructor-dashboard.profile.index', compact('gateways'));
    }

    public function profileUpdate(ProfileUpdateRequest $request, ): RedirectResponse
    {
        $user = $request->user();

        if ($request->hasFile('avatar')) {
            $avatarPath = $this->uploadFile($request->file('avatar'));
            $this->deleteFile($user->image);
            $user->image = $avatarPath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->headline = $request->headline;
        $user->bio = $request->about;
        $user->gender = $request->gender;
        $user->save();

        notyf()->success('Your profile has been updated.');

        return redirect()->back();
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        notyf()->success('Your password has been updated.');

        return redirect()->back();
    }

    public function updateSocial(SocialUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->facebook = $request->facebook;
        $user->x = $request->x;
        $user->linkedin = $request->linkedin;
        $user->website = $request->website;
        $user->save();

        notyf()->success('Your social links has been updated.');

        return redirect()->back();
    }

    public function updateGatewayInfo(Request $request)
    {
        $request->validate([
            'gateway' => ['required', 'string', 'max:255'],
            'information' => ['required', 'string', 'max:2000'],
        ]);

        InstructorPayoutInformation::updateOrCreate(
            ['instructor_id' => auth('web')->id()],
            [
                'gateway' => $request->gateway,
                'information' => $request->information
            ]
        );

        notyf()->success('Updated Successfully');

        return redirect()->back();
    }
}
