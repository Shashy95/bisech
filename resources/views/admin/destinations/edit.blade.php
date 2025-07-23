@extends('admin._layouts.master')

@section('body')
<div class="max-w-4xl mx-auto bg-white shadow rounded p-6">
    <h2 class="text-2xl font-semibold mb-6">Edit Destination</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <strong>Oops! Something went wrong:</strong>
            <ul class="list-disc pl-5 mt-2 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title', $destination->title) }}" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Current Image</label>
            @if ($destination->image)
                <img src="{{ asset('storage/' . $destination->image) }}" class="w-32 h-20 object-cover rounded shadow mb-2" alt="Current Image">
            @else
                <p class="text-sm text-gray-500">No image uploaded</p>
            @endif

            <label class="block mb-1 mt-2 font-medium text-gray-700">Upload New Image</label>
            <input type="file" name="image" class="w-full">
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Short Description</label>
            <textarea name="description" rows="3" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('description', $destination->description) }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">Paragraph</label>
            <textarea name="paragraph" rows="5" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('paragraph', $destination->paragraph) }}</textarea>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.destinations.index') }}" class="mr-4 px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update Destination</button>
        </div>
    </form>
</div>
@endsection
