<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('admin.slides.index', compact('slides'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $request->file('image')->store('slides', 'public');
        $validated['image'] = '/storage/' . $path;

        Slide::create($validated);

        return redirect()->back()->with('success', 'Slide created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($slide->image && Storage::exists(str_replace('/storage/', 'public/', $slide->image))) {
                Storage::delete(str_replace('/storage/', 'public/', $slide->image));
            }

            $path = $request->file('image')->store('slides', 'public');
            $validated['image'] = '/storage/' . $path;
        }

        $slide->update($validated);

        return redirect()->route('slides.index')->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if ($slide->image && Storage::exists(str_replace('/storage/', 'public/', $slide->image))) {
            Storage::delete(str_replace('/storage/', 'public/', $slide->image));
        }

        $slide->delete();

        return redirect()->back()->with('success', 'Slide deleted successfully.');
    }
}
