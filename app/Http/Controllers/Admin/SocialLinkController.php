<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use App\Traits\FileUpload;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $socials = SocialLink::all();
        return view('admin.social-link.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'image|max:3000|required',
            'url' => 'required|url|max:255',
            'status' => 'boolean'
        ]);

        $social = new SocialLink();
        $social->icon = $this->uploadFile($request->file('icon'));
        $social->url = $request->url;
        $social->status = $request->status ?? 0;
        $social->save();

        notyf('Created Successfully!');

        return to_route('admin.social-links.index');
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
        $social = SocialLink::findOrFail($id);

        return view('admin.social-link.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'icon' => 'image|max:3000|nullable',
            'url' => 'required|url|max:255',
            'status' => 'nullable|boolean'
        ]);

        $social = SocialLink::findOrFail($id);

        if ($request->hasFile('icon')) {
            $this->deleteFile($social->icon);
            $social->icon = $this->uploadFile($request->file('icon'));
        }

        $social->url = $request->url;
        $social->status = $request->status ?? 0;
        $social->save();

        notyf('Updated Successfully!');

        return to_route('admin.social-links.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialLink $social_link)
    {
        try {
            $this->deleteFile($social_link->icon);
            $social_link->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Social Link Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
