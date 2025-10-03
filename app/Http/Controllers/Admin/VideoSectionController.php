<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoSection;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class VideoSectionController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $video = VideoSection::first();

        return view('admin.sections.video.index', compact('video'));
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
            'background' => 'nullable|image|max:3000',
            'video_url' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:255',
            'button_url' => 'nullable|string|max:255',
        ]);

        if($request->hasFile('background')){
             $video = VideoSection::first();

            if (isset($video->background)) {
                $oldBackgroundPath = $video->background;
                $this->deleteFile($oldBackgroundPath);
            }

            $data['background'] = $this->uploadFile($request->file('background'));
        }

        VideoSection::updateOrCreate(['id' => 1 ],$data);

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
