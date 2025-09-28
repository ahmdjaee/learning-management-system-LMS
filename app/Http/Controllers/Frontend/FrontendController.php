<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\Feature;
use App\Models\Hero;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

        return view('frontend.pages.home.index', compact('hero', 'feature', 'categories'));

    }
}
