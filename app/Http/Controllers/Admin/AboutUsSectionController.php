<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutUsSectionUpdateRequest;
use App\Models\AboutUsSection;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AboutUsSectionController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $about = AboutUsSection::first();
        return view('admin.sections.about-section.index', compact('about'));
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
    public function store(AboutUsSectionUpdateRequest $request)
    {
        $data  = $request->validated();

        $about = AboutUsSection::first();

        if($request->hasFile('image')){
            $data['image'] = $this->uploadFile($request->file('image'));
            if($about->image) $this->deleteFile($about->image);
        }
   
        if($request->hasFile('learner_image')){
            $data['learner_image'] = $this->uploadFile($request->file('learner_image'));
            if($about->learner_image) $this->deleteFile($about->learner_image);
        }

        if($request->hasFile('video_image')){
            $data['video_image'] = $this->uploadFile($request->file('video_image'));
            if($about->video_image) $this->deleteFile($about->video_image);
        }

        AboutUsSection::updateOrCreate(['id' => 1], $data);

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
