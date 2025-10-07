<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursePageController extends Controller
{
    public function index(): View
    {
        $courses = Course::where('is_approved', 'approved')
        ->where('status', 'active')
        ->paginate(12);

        $categories = CourseCategory::where(['status' =>  1, 'parent_id' => null])->get();
        $levels = CourseLevel::all();
        $languages = CourseLanguage::all();

        return view('frontend.pages.course-page', compact('courses', 'categories', 'levels', 'languages'));
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
