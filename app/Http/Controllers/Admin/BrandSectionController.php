<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class BrandSectionController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.sections.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|required|max:3000',
            'url' => 'nullable|max:255|url',
            'status' => 'required|boolean',
        ]);

        $brand = new Brand();

        $brand->image = $this->uploadFile($request->file('image'));
        $brand->url = $request->url;
        $brand->status = $request->status;
        $brand->save();

        notyf('Created successfully!');

        return redirect()->route('admin.brand-section.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.sections.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand_section)
    {
        $request->validate([
            'image' => 'image|nullable|max:3000',
            'url' => 'required|max:255|url',
            'status' => 'required|boolean',
        ]);

        $brand = $brand_section;

        if ($request->hasFile('image')) {
            $this->deleteFile($brand_section->image);
            $brand->image = $this->uploadFile($request->file('image'));
        }

        $brand->url = $request->url;
        $brand->status = $request->status;
        $brand->save();

        notyf('Created successfully!');

        return redirect()->route('admin.brand-section.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand_section)
    {
        try {
            $this->deleteFile($brand_section->image);
            $brand_section->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Brand Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
