<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureUpdateRequest;
use App\Models\Feature;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feature =Feature::first();
        return view('admin.sections.feature.index', compact('feature'));
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
    public function store(FeatureUpdateRequest $request)
    {
        $data = $request->validated();
        $feature = Feature::first();

        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile('image_' . $i)) {
                if (isset($feature->{'image_' . $i})) {
                    $oldImagePath = $feature->{'image_' . $i};
                    $this->deleteFile($oldImagePath);
                }

                $imagePath = $this->uploadFile($request->file('image_' . $i));
                $data['image_' . $i] = $imagePath;
            }
        }

        Feature::updateOrCreate(['id' => 1], $data);

        notyf('Updated Successfully');

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
