<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    public function createChapterModal(string $id): string
    {
        return view('frontend.instructor-dashboard.course.partials.course-chapter-modal', compact('id'))->render();
    }

    public function storeChapter(Request $request, string $courseId): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);



        $chapter = new CourseChapter();

        $chapter->title = $request->title;
        $chapter->course_id = $courseId;
        $chapter->instructor_id = auth()->id();
        $chapter->order = CourseChapter::where('course_id', $courseId)->count() + 1;
        $chapter->save();

        return redirect()->back();




    }
}
