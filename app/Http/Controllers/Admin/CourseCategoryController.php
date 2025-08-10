<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCategoryStoreRequest;
use App\Http\Requests\CourseCategoryUpdateRequest;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::latest()->paginate(15);
        return view('admin.course.course-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.course-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCategoryStoreRequest $request)
    {
        $data = $request->validated();

        $category = new CourseCategory();
        $category->icon = $data['icon'];
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->show_at_trending = isset($data['show_at_trending']) == 'on' ? 1 : 0;
        $category->status = isset($data['status']) == 'on' ? 1 : 0;

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($data['image']);
            $category->image = $imagePath;
        }
        $category->save();

        notyf()->success("Category created successfully");
        return redirect(route('admin.course-categories.index'));

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $course_category)
    {
        return view('admin.course.course-category.edit', ['category' => $course_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseCategoryUpdateRequest $request, CourseCategory $course_category)
    {
        $data = $request->validated();

        $category = $course_category;
        $category->icon = $data['icon'];
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->show_at_trending = isset($data['show_at_trending']) == 'on' ? 1 : 0;
        $category->status = isset($data['status']) == 'on' ? 1 : 0;

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($data['image']);
            if (isset($category->image)) {
                $this->deleteFile($category->image);
            }
            
            $category->image = $imagePath;
        }

        $category->save();

        notyf()->success("Category updated successfully");
        return redirect(route('admin.course-categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseCategory $course_category)
    {
        try {
            $this->deleteFile($course_category->image);

            $course_category->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Course Category Delete Error - ".$th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
