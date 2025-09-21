<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseChapterLesson;
use App\Models\Enrollment;
use App\Models\WatchHistory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnrolledCourseController extends Controller
{
    public function index(): View
    {
        $enrollments = Enrollment::with('course')->where('user_id', auth('web')->id())->get();

        return view('frontend.student-dashboard.enrolled-course.index', compact('enrollments'));
    }

    public function player(string $slug): ?View
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        if (!Enrollment::where('user_id', auth()->id())->where('course_id', $course->id)->where('have_access', 1)->exists()) {
            return abort(404);
        }

        $lastWatchHistory = WatchHistory::where(['user_id' => auth()->id(), 'course_id' => $course->id,])->orderByDesc('updated_at')->first();
        $watchedLessonIds = WatchHistory::where(['user_id' => auth()->id(), 'course_id' => $course->id, 'is_completed' => 1])->pluck('lesson_id')->toArray(); 

        return view('frontend.student-dashboard.enrolled-course.player', compact('course', 'lastWatchHistory', 'watchedLessonIds'));
    }

    public function getLessonContent(Request $request)
    {
        $data = CourseChapterLesson::where([
            'course_id' => $request->course_id,
            'chapter_id' => $request->chapter_id,
            'id' => $request->lesson_id,
        ])->firstOrFail();

        return response()->json($data);
    }

    public function updateWatchHistory(Request $request)
    {
        WatchHistory::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'lesson_id' => $request->lesson_id,
            ],
            [
                'course_id' => $request->course_id,
                'chapter_id' => $request->chapter_id,
                'updated_at' => now()
            ]
        );
    }

    public function updateLessonCompletion(Request $request): Response
    {

        $watchedLesson = WatchHistory::where([
            'user_id' => auth()->id(),
            'lesson_id' => $request->lesson_id
        ])->first();

        WatchHistory::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'lesson_id' => $request->lesson_id,
            ],
            [
                'course_id' => $request->course_id,
                'chapter_id' => $request->chapter_id,
                'is_completed' => !$watchedLesson->is_completed
            ]
        );

        return response(['status'=> 'success', 'message' => 'Updated Successfully!']);

    }
}
