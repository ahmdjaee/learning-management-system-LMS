<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\OrderItem;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InstructorDashboardController extends Controller
{
    public function index(): View
    {
        $pendingCourses = Course::where('instructor_id', user()->id)->where('is_approved', 'pending')->count();
        $approvedCourses = Course::where('instructor_id', user()->id)->where('is_approved', 'approved')->count();
        $rejectedCourses = Course::where('instructor_id', user()->id)->where('is_approved', 'rejected')->count();

        $recentOrders = OrderItem::with(['order', 'course'])->whereHas('course', function (Builder $q) {
            $q->where('instructor_id', auth()->id());
        })->take(5)->get();

        return view(
            'frontend.instructor-dashboard.index',
            compact('pendingCourses', 'approvedCourses', 'rejectedCourses' , 'recentOrders')
        );
    }
}
