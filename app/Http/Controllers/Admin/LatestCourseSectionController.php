<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\LatestCourseSection;
use Illuminate\Http\Request;

class LatestCourseSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CourseCategory::all();
        $latestCourseSection = LatestCourseSection::first();
        return view('admin.sections.latest-course.index', compact('categories', 'latestCourseSection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_1' => 'nullable|exists:course_categories,id',
            'category_2' => 'nullable|exists:course_categories,id',
            'category_3' => 'nullable|exists:course_categories,id',
            'category_4' => 'nullable|exists:course_categories,id',
            'category_5' => 'nullable|exists:course_categories,id',
        ]);

        LatestCourseSection::updateOrCreate([
            'id' => 1,
        ] , $data);

        notyf('Updated Successfully!');

        return redirect()->back();

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
