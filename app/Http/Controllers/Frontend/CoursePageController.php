<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursePageController extends Controller
{
    public function index(): View
    {
        $courses = Course::where('is_approved', 'approved')
        ->where('status', 'active')
        ->paginate(12);
        
        return view('frontend.pages.course-page', compact('courses'));
    }

    public function show(string $slug): View
    {
        $course = Course::where('slug' , $slug)
        ->where('is_approved', 'approved')
        ->where('status', 'active')
        ->firstOrFail();

        return view('frontend.pages.course-details-page', compact('course'));
    }
}
