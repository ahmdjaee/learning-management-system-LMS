<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseSubCategoryStoreRequest;
use App\Http\Requests\Admin\CourseSubCategoryUpdateRequest;
use App\Models\CourseCategory;
use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseSubCategoryController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(CourseCategory $course_category)
    {
        $subCategories = CourseCategory::latest()->where('parent_id', $course_category->id)->get();
        return view(
            'admin.course.course-sub-category.index',
            ["category" => $course_category, "subCategories" => $subCategories],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CourseCategory $course_category)
    {
        return view('admin.course.course-sub-category.create', ["category" => $course_category]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseSubCategoryStoreRequest $request, CourseCategory $course_category)
    {

        $data = $request->validated();

        $category = new CourseCategory();
        $category->icon = $data['icon'];
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->parent_id = $course_category->id;
        $category->show_at_trending = isset($data['show_at_trending']) == 'on' ? 1 : 0;
        $category->status = isset($data['status']) == 'on' ? 1 : 0;

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($data['image']);
            $category->image = $imagePath;
        }
        $category->save();

        notyf()->success("Sub Category created successfully");
        return redirect(route('admin.course-sub-categories.index', $course_category->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseCategory $course_category, CourseCategory $course_sub_category)
    {
        return view('admin.course.course-sub-category.edit', [
            'category' => $course_category,
            'subCategory' => $course_sub_category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseSubCategoryUpdateRequest $request, CourseCategory $course_category, CourseCategory $course_sub_category)
    {
      
        $data = $request->validated();

        $category = $course_sub_category;
        $category->icon = $data['icon'];
        $category->name = $data['name'];
        $category->slug = Str::slug($data['name']);
        $category->parent_id = $course_category->id;
        $category->show_at_trending = isset($data['show_at_trending']) == 'on' ? 1 : 0;
        $category->status = isset($data['status']) == 'on' ? 1 : 0;

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($data['image']);
            $this->deleteFile($category->image);
            $category->image = $imagePath;
        }
        $category->save();

        notyf()->success("Sub Category updated successfully");
        return redirect(route('admin.course-sub-categories.index', $course_category->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( CourseCategory $course_category,CourseCategory $course_sub_category)
    {
        try {
            $this->deleteFile($course_sub_category->image);

            $course_sub_category->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Course Category Delete Error - ".$th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
