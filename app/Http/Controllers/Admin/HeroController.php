<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\HeroUpdateRequest;
use App\Models\Hero;
use App\Traits\FileUpload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();

        return view('admin.sections.hero.index', compact('hero'));
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
    public function store(HeroUpdateRequest $request): RedirectResponse
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadFile($request->file('image'));
            $data['image'] = $imagePath;
        }

        Hero::updateOrCreate(['id' => 1], $data);

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
