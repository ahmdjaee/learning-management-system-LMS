<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseChapter;
use App\Models\CourseChapterLesson;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        notyf()->success("Created successfully");

        return redirect()->back();

    }

    public function editChapterModal(string $id): string
    {
        $editMode = true;
        $chapter = CourseChapter::where(['id' => $id, 'instructor_id' => auth()->id()])->firstOrFail();

        return view(
            'frontend.instructor-dashboard.course.partials.course-chapter-modal',
            compact('chapter', 'editMode')
        )->render();
    }

    public function updateChapterModal(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $chapter = CourseChapter::findOrFail($id);

        $chapter->title = $request->title;
        $chapter->save();

        notyf()->success("Updated successfully");

        return redirect()->back();
    }

    public function destroyChapter(string $id): Response
    {
        try {
            $chapter = CourseChapter::findOrFail($id);
            $chapter->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Course Chapter Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }

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
        $lesson->is_preview = $request->preview ? 1 : 0;
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

    public function editLesson(Request $request): string
    {
        $editMode = true;

        $courseId = $request->course_id;
        $chapterId = $request->chapter_id;
        $lessonId = $request->lesson_id;
        $lesson = CourseChapterLesson::where(
            [
                'chapter_id' => $chapterId,
                'course_id' => $courseId,
                'id' => $lessonId,
                'instructor_id' => auth()->id(),
            ]
        )->first();

        return view(
            'frontend.instructor-dashboard.course.partials.chapter-lesson-modal',
            compact('chapterId', 'courseId', 'lesson', 'editMode')
        )->render();
    }

    public function updateLesson(Request $request, int $id): RedirectResponse
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

        $lesson = CourseChapterLesson::findOrFail($id);
        $lesson->title = $request->title;
        $lesson->slug = Str::slug($request->title);
        $lesson->storage = $request->source;
        $lesson->file_path = $request->filled('file') ? $request->file : $request->url;
        $lesson->file_type = $request->file_type;
        $lesson->duration = $request->duration;
        $lesson->is_preview = $request->preview ? 1 : 0;
        $lesson->downloadable = $request->downloadable ? 1 : 0;
        $lesson->description = $request->description;
        $lesson->instructor_id = auth()->id();
        $lesson->course_id = $request->course_id;
        $lesson->chapter_id = $request->chapter_id;
        $lesson->save();

        notyf()->success("Updated successfully");

        return redirect()->back();
    }

    public function destroyLesson(int $id): Response
    {
        try {
            $lesson = CourseChapterLesson::findOrFail($id);
            $lesson->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Course Chapter Lesson Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }

    public function sortLesson(Request $request, string $id)
    {
        $orderIds = $request->order_ids;

        foreach ($orderIds as $key => $orderId) {
            $lesson = CourseChapterLesson::where(['id' => $orderId, 'chapter_id' => $id])->first();
            $lesson->order = $key + 1;
            $lesson->save();
        }

        return response(['message' => 'Updated Successfully'], 200);

    }
}
