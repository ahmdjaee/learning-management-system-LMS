<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\FileUpload;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use FileUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactCards = Contact::all();
        return view('admin.contact.index', compact('contactCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'required|image|max:3000',
            'title' => 'required|string|max:255',
            'line_1' => 'nullable|string|max:255',
            'line_2' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $data['icon'] = $this->uploadFile($request->file('icon'));

        $contact = new Contact();
        $contact->icon = $data['icon'];
        $contact->title = $data['title'];
        $contact->line_1 = $data['line_1'];
        $contact->line_2 = $data['line_2'];
        $contact->status = $data['status'];
        $contact->save();

        notyf('Created Successfully!');

        return redirect()->route('admin.contact.index');

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
        $contactCard = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contactCard'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'icon' => 'nullable|image|max:3000',
            'title' => 'required|string|max:255',
            'line_1' => 'nullable|string|max:255',
            'line_2' => 'nullable|string|max:255',
            'status' => 'required|boolean',
        ]);

        $contact = Contact::findOrFail($id);

        if ($request->hasFile('icon')) {
            $this->deleteFile($contact->icon);
            $contact->icon = $this->uploadFile($request->file('icon'));
        }

        $contact->title = $data['title'];
        $contact->line_1 = $data['line_1'];
        $contact->line_2 = $data['line_2'];
        $contact->status = $data['status'];
        $contact->save();

        notyf('Created Successfully!');

        return redirect()->route('admin.contact.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        try {
            $this->deleteFile($contact->image);
            $contact->delete();
            notyf()->success('Deleted Successfully');
            return response(['message' => 'Deleted Successfully'], 200);
        } catch (\Throwable $th) {
            logger("Contact Delete Error - " . $th);
            return response(['message' => 'Something went wrong!'], 500);
        }
    }
}
