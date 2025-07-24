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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slides.create');
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
        $validated['image'] = $path; // Store only relative path like 'slides/filename.jpg'

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
            $this->deleteImageIfExists($slide->image);
            $path = $request->file('image')->store('slides', 'public');
            $validated['image'] = $path;
        }

        $slide->update($validated);

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        $this->deleteImageIfExists($slide->image);
        $slide->delete();

        return redirect()->back()->with('success', 'Slide deleted successfully.');
    }

    /**
     * Delete image from storage if it exists.
     */
    private function deleteImageIfExists($path)
    {
        $storagePath = str_replace('storage/', 'public/', $path);
        if (Storage::exists($storagePath)) {
            Storage::delete($storagePath);
        }
    }
}
