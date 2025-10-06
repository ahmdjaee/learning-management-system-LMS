<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counter = Counter::first();
       return view('admin.sections.counter.index', compact('counter'));
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
            'counter_1' => 'nullable|numeric',
            'title_1' => 'nullable|string|max:255',

            'counter_2' => 'nullable|numeric',
            'title_2' => 'nullable|string|max:255',

            'counter_3' => 'nullable|numeric',
            'title_3' => 'nullable|string|max:255',

            'counter_4' => 'nullable|numeric',
            'title_4' => 'nullable|string|max:255',
        ]);

        Counter::updateOrCreate(['id' => 1], $data);

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
