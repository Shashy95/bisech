@extends('admin._layouts.master')

@section('body')
<div class="max-w-2xl mx-auto bg-white shadow p-6 rounded">
    <h2 class="text-xl font-semibold mb-4">Create New Slide</h2>

    <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Title</label>
            <input type="text" name="title" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-medium">Subtitle</label>
            <input type="text" name="subtitle" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block font-medium">Description</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>

        <div>
            <label class="block font-medium">Image</label>
            <input type="file" name="image" class="w-full border rounded p-2" required>
        </div>

        <div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Save Slide
            </button>
        </div>
    </form>
</div>
@endsection
