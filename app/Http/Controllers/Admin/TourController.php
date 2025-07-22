<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('admin.tours.index', compact('tours'));
    }

  public function showDetailTwo($slug)
{
    $tour = Tour::where('slug', $slug)->firstOrFail();
    return view('tour-detail-one', compact('tour'));
}
    public function create()
    {
        return view('admin.tours.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'paragraph' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('tours', 'public');
        }

        $data['slug'] = Str::slug($data['title']);

        Tour::create($data);

        return redirect()->route('admin.tour-packages.index')->with('success', 'Tour created successfully.');

    }

    public function show(Tour $tour)
    {
        return view('admin.tours.show', compact('tour'));
    }

    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'paragraph' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($tour->image && Storage::disk('public')->exists($tour->image)) {
                Storage::disk('public')->delete($tour->image);
            }
            $data['image'] = $request->file('image')->store('tours', 'public');
        }

        $data['slug'] = Str::slug($data['title']);

        $tour->update($data);

        return redirect()->route('admin.tour-packages.index')->with('success', 'Tour updated successfully.');
    }

    public function destroy(Tour $tour)
    {
        if ($tour->image && Storage::disk('public')->exists($tour->image)) {
            Storage::disk('public')->delete($tour->image);
        }

        $tour->delete();

        return redirect()->route('admin.tour-packages.index')->with('success', 'Tour deleted successfully.');
    }
}
