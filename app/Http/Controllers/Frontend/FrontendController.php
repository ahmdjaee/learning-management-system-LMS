<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsSection;
use App\Models\BecomeInstructorSection;
use App\Models\Brand;
use App\Models\Counter;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Feature;
use App\Models\FeaturedInstructor;
use App\Models\Hero;
use App\Models\LatestCourseSection;
use App\Models\Newsletter;
use App\Models\Testimonial;
use App\Models\VideoSection;
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

        $becomeInstructor = BecomeInstructorSection::first();
        $video = VideoSection::first();
        $brands = Brand::where('status', 1)->get();
        $featuredInstructor = FeaturedInstructor::first();
        $featuredInstructorCourses = $featuredInstructor ? Course::whereIn('id', json_decode($featuredInstructor->featured_courses))->get() : [];
        $testimonials = Testimonial::all();

        return view('frontend.pages.home.index', compact(
            'hero',
            'feature',
            'categories',
            'about',
            'latestCourses',
            'becomeInstructor',
            'video',
            'brands',
            'featuredInstructor',
            'featuredInstructorCourses',
            'testimonials'
        ));
    }

    public function subscribe(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:newsletters,email']
        ], [
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

    public function about() : View {
        $about = AboutUsSection::first();
        $counter = Counter::first();
        $testimonials = Testimonial::all();

        return view('frontend.pages.about', compact('about', 'counter', 'testimonials'));
    
    }

    public function blog() : View {

        return view('frontend.pages.blog');
    
    }
}
