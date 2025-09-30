<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSection;
use App\Models\CourseCategory;
use App\Models\Feature;
use App\Models\Hero;
use App\Models\LatestCourseSection;
use App\Models\Newsletter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FrontendController extends Controller
{
    public function index(): View
    {
        $hero = Hero::first();
        $feature = Feature::first();
        $categories = CourseCategory::withCount(['subCategories as active_course_count' => function ($q) {
            $q->whereHas('courses', function ($q) {
                $q->where(['status' => 'active', 'is_approved' => 'approved']);
            });
        }
        ])->where(['show_at_trending' => 1, 'parent_id' => null, 'status' => 1])->limit(8)->get();

        $about = AboutUsSection::first();
        $latestCourses = LatestCourseSection::first();

        return view('frontend.pages.home.index', compact('hero', 'feature', 'categories', 'about', 'latestCourses'));
    }

    public function subscribe(Request $request) : JsonResponse {
        $request->validate([
            'email' => ['required', 'email', 'unique:newsletters,email']
        ],[
            'email.unique' => 'Already subscribe to newsletter!'
        ]);

        $newsLetter = new Newsletter();
        $newsLetter->email = $request->email;
        $newsLetter->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Subscribe to newsletter successfully!'
        ]);
    
    }
}
