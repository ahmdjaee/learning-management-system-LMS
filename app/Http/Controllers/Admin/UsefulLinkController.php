<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsefulLink;
use Illuminate\Http\Request;

class UsefulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = UsefulLink::all();

        return view('admin.footer.useful-link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.useful-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string|required|max:255',
            'url' => 'string|required|max:255',
            'status' => 'boolean',
        ]);

        $link = new UsefulLink();
        $link->title = $request->title;
        $link->url = $request->url;
        $link->status = $request->status ?? 0;
        $link->save();

        notyf('Created Successfully!');

        return to_route('admin.useful-links.index');
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
        $link = UsefulLink::findOrFail($id);

        return view('admin.footer.useful-link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'string|required|max:255',
            'url' => 'string|required|max:255',
            'status' => 'nullable|boolean',
        ]);

        $link = UsefulLink::findOrFail($id);
        $link->title = $request->title;
        $link->url = $request->url;
        $link->status = $request->status ?? 0;
        $link->save();

        notyf('Updated Successfully!');

        return to_route('admin.useful-links.index');

    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(UsefulLink $useful_link)
    {
        try {
            $useful_link->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Useful Link Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
