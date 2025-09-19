<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EnrolledCourseController extends Controller
{
    public function index(): View
    {
        $enrollments = Enrollment::with('course')->where('user_id', auth('web')->id())->get();

        return view('frontend.student-dashboard.enrolled-course.index', compact('enrollments'));
    }
}
