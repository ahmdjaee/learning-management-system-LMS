<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MoreLink;
use Illuminate\Http\Request;

class MoreLinkController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = MoreLink::all();

        return view('admin.footer.more-link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.more-link.create');
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

        $link = new MoreLink();
        $link->title = $request->title;
        $link->url = $request->url;
        $link->status = $request->status ?? 0;
        $link->save();

        notyf('Created Successfully!');

        return to_route('admin.more-links.index');
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
        $link = MoreLink::findOrFail($id);

        return view('admin.footer.more-link.edit', compact('link'));
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

        $link = MoreLink::findOrFail($id);
        $link->title = $request->title;
        $link->url = $request->url;
        $link->status = $request->status ?? 0;
        $link->save();

        notyf('Updated Successfully!');

        return to_route('admin.more-links.index');

    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(MoreLink $more_link)
    {
        try {
            $more_link->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("More Link Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
