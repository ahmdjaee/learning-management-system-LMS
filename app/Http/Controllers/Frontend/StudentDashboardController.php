<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentDashboardController extends Controller
{
    use FileUpload;
    //
    public function index(): View
    {
        return view('frontend.student-dashboard.index');
    }

    public function becomeInstructor(): View{
        if(auth()->user()->role == 'instructor')  abort(403);
        return view('frontend.student-dashboard.become-instructor.index');
    
    }

    public function becomeInstructorUpdate(Request $request, User $user): RedirectResponse{
        $request->validate(['document' => ['required', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:12800']]);
        
        $filePath = $this->uploadFile($request->file('document'));

        $user->update([
            'approve_status' => 'pending',
            'document' => $filePath,
        ]);

       return redirect()->route('student.dashboard');
    }
    
}
