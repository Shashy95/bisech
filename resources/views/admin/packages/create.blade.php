@extends('admin.layouts.master') {{-- or whatever your layout is called --}}

@section('title', 'Create Package')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-6">Create New Package</h2>

    <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block font-medium">Title</label>
            <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <!-- Location -->
        <div class="mb-4">
            <label for="location" class="block font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <!-- Category -->
        <div class="mb-4">
            <label for="category" class="block font-medium">Category</label>
            <input type="text" name="category" id="category" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <!-- Price -->
        <div class="mb-4">
            <label for="price" class="block font-medium">Price</label>
            <input type="text" name="price" id="price" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>

        <!-- Discount -->
        <div class="mb-4">
            <label for="discount" class="block font-medium">Discount</label>
            <input type="text" name="discount" id="discount" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border border-gray-300 rounded px-4 py-2" rows="4"></textarea>
        </div>

        <!-- Image -->
        <div class="mb-6">
            <label for="image" class="block font-medium">Image</label>
            <input type="file" name="image" id="image" class="w-full">
        </div>

        <div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
                Save Package
            </button>
        </div>
    </form>
</div>
@endsection
