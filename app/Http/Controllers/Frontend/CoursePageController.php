<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLanguage;
use App\Models\CourseLevel;
use App\Models\Enrollment;
use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CoursePageController extends Controller
{
    public function index(Request $request): View
    {
        $courses = Course::where('is_approved', 'approved')
            ->where('status', 'active')
            ->when($request->has('search') && $request->filled('search'), function (Builder $q) use ($request) {
                $q->where('title', 'like', "%$request->search%")
                    ->orWhere('description', 'like', "%$request->search%");
            })
            ->when($request->has('category') && $request->filled('category'), function (Builder $q) use ($request) {
                $q->whereIn('category_id', $request->category);
            })
            ->when($request->has('level') && $request->filled('level'), function (Builder $q) use ($request) {
                $q->whereIn('course_level_id', $request->level);
            })
            ->when($request->has('language') && $request->filled('language'), function (Builder $q) use ($request) {
                $q->whereIn('course_language_id', $request->language);
            })
            ->when($request->has('from') && $request->has('to') && $request->filled('from') && $request->filled('to'), function (Builder $q) use ($request) {
                $q->whereBetween('price', [$request->from, $request->to]);
            })
            ->orderBy('id', $request->filled('order') ? $request->order : 'desc')
            ->paginate(2);

        $categories = CourseCategory::where(['status' => 1, 'parent_id' => null])->get();
        $levels = CourseLevel::all();
        $languages = CourseLanguage::all();

        return view('frontend.pages.course-page', compact('courses', 'categories', 'levels', 'languages'));
    }

    public function show(string $slug): View
    {
        $course = Course::with('reviews')->where('slug', $slug)
            ->where('is_approved', 'approved')
            ->where('status', 'active')
            ->firstOrFail();

        $reviews = Review::where('course_id', $course->id)->where('status', 1)
        ->paginate(1)
        ->withQueryString();

        return view('frontend.pages.course-details-page', compact('course', 'reviews'));
    }



    public function storeReview(Request $request): RedirectResponse
    {
        $request->validate([
            'rating' => 'required|numeric',
            'review' => 'required|string|max:1000',
            'course_id' => 'integer',
        ]);

        $isAlreadyEnrolled = Enrollment::where('user_id', auth('web')->id())->where('course_id', $request->course_id)
            ->where('have_access', 1)->exists();

        $isAlreadyReview = Review::where('user_id', auth('web')->id())->where('course_id', $request->course_id)
            ->where('status', operator: 1)->exists();

        $isAlreadySubmit = Review::where('user_id', auth('web')->id())->where('course_id', $request->course_id)
            ->where('status', operator: 0)->exists();

        if ($isAlreadySubmit) {
            notyf()->info('Already reviewed, waiting for admin approval!');
            return redirect()->back();
        }

        if ($isAlreadyReview) {
            notyf()->error('You already review this course!');
            return redirect()->back();
        }

        if (!$isAlreadyEnrolled) {
            abort(403);
        }

        $review = new Review();
        $review->rating = $request->rating;
        $review->course_id = $request->course_id;
        $review->review = $request->review;
        $review->user_id = auth()->id();
        $review->save();

        notyf('Submit Successfully!, Waiting for Admin Approval');

        return redirect()->back();
    }
}
