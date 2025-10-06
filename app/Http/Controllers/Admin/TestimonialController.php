<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.sections.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'review' => ['required', 'string', 'max:1000'],
            'user_image' => ['required', 'image', 'max:3000'],
            'user_name' => ['required', 'string', 'max:255'],
            'user_title' => ['required', 'string', 'max:255'],
        ]);

        $testimonial = new Testimonial();

        $testimonial->user_image = $this->uploadFile($data['user_image']);
        $testimonial->rating = $data['rating'];
        $testimonial->review = $data['review'];
        $testimonial->user_name = $data['user_name'];
        $testimonial->user_title = $data['user_title'];
        $testimonial->save();

        notyf('Created Succesfully!');

        return redirect()->route('admin.testimonials-section.index');
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
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.sections.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'rating' => ['required', 'integer', 'between:1,5'],
            'review' => ['required', 'string', 'max:1000'],
            'user_image' => ['nullable', 'image', 'max:3000'],
            'user_name' => ['required', 'string', 'max:255'],
            'user_title' => ['required', 'string', 'max:255'],
        ]);

        $testimonial = Testimonial::findOrFail($id);

        if ($request->hasFile('user_image')) {
            $testimonial->user_image = $this->uploadFile($request->file('user_image'));
            $this->deleteFile($request->old_image);
        }

        $testimonial->rating = $data['rating'];
        $testimonial->review = $data['review'];
        $testimonial->user_name = $data['user_name'];
        $testimonial->user_title = $data['user_title'];
        $testimonial->save();

        notyf('Updated Succesfully!');

        return redirect()->route('admin.testimonials-section.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonials_section)
    {
        try {
            $this->deleteFile($testimonials_section->user_image);
            $testimonials_section->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Testimonial Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
