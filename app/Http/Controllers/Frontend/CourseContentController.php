<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use App\Models\CourseChapterLesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseContentController extends Controller
{
    public function createChapterModal(Request $request, string $id): string
    {
        $courseId = $request->course_id;
        $chapterId = $request->chapter_id;
        return view(
            'frontend.instructor-dashboard.course.partials.course-chapter-modal',
            compact('id', 'courseId', 'chapterId')
        )->render();
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


    public function createLesson(Request $request): string
    {
        $courseId = $request->course_id;
        $chapterId = $request->chapter_id;
        return view('frontend.instructor-dashboard.course.partials.chapter-lesson-modal', compact('chapterId', 'courseId'))->render();
    }

    public function storeLesson(Request $request): RedirectResponse
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'source' => ['required', 'string', 'max:255'],
            // 'path' => ['required'],
            'file_type' => ['required', 'in:video,audio,file,doc,pdf'],
            'duration' => ['required'],
            'is_preview' => ['nullable', 'boolean'],
            'downloadable' => ['nullable', 'boolean'],
            'description' => ['nullable']
        ];

        if ($request->filled('file')) {
            $rules['file'] = ['required'];
        } else {
            $rules['url'] = ['required'];
        }
        $request->validate($rules);

        $lesson = new CourseChapterLesson();
        $lesson->title = $request->title;
        $lesson->slug = Str::slug($request->title);
        $lesson->storage = $request->source;
        $lesson->file_path = $request->filled('file') ? $request->file : $request->url;
        $lesson->file_type = $request->file_type;
        $lesson->duration = $request->duration;
        $lesson->is_preview = $request->is_preview ? 1 : 0;
        $lesson->downloadable = $request->downloadable ? 1 : 0;
        $lesson->description = $request->description;
        $lesson->instructor_id = auth()->id();
        $lesson->course_id = $request->course_id;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->order = CourseChapterLesson::where('chapter_id', $request->chapter_id)->count() + 1;
        $lesson->save();

        notyf()->success("Created successfully");

        return redirect()->back();
    }
}
