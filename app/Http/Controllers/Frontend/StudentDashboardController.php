<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
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

    public function becomeInstructor(): View
    {
        if (auth()->user()->role == 'instructor')
            abort(403);
        return view('frontend.student-dashboard.become-instructor.index');

    }

    public function becomeInstructorUpdate(Request $request, User $user): RedirectResponse
    {
        $request->validate(['document' => ['required', 'mimes:pdf,doc,docx,jpg,jpeg,png', 'max:12800']]);

        $filePath = $this->uploadFile($request->file('document'));

        $user->update([
            'approve_status' => 'pending',
            'document' => $filePath,
        ]);

        return redirect()->route('student.dashboard');
    }

    public function review(): View
    {

        $reviews = Review::where('user_id', auth()->id())->paginate(15);
        return view('frontend.student-dashboard.review.index', compact('reviews'));

    }

    public function reviewDestroy(string $id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Review Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
