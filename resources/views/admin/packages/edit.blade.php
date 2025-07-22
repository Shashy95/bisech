@extends('layouts.admin')

@section('content')
<section class="max-w-4xl mx-auto mt-12 bg-white dark:bg-slate-800 shadow-md rounded-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Edit Package: {{ $package->title }}</h2>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc ml-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('packages.update', $package->id) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" value="{{ old('title', $package->title) }}" class="w-full rounded border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Location <span class="text-red-500">*</span></label>
                <input type="text" name="location" value="{{ old('location', $package->location) }}" class="w-full rounded border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Category <span class="text-red-500">*</span></label>
                <input type="text" name="category" value="{{ old('category', $package->category) }}" class="w-full rounded border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Price <span class="text-red-500">*</span></label>
                <input type="text" name="price" value="{{ old('price', $package->price) }}" class="w-full rounded border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Discount</label>
                <input type="text" name="discount" value="{{ old('discount', $package->discount) }}" class="w-full rounded border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Image</label>
                <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-700 dark:text-white file:bg-indigo-600 file:text-white file:rounded file:px-4 file:py-2 file:border-0 file:cursor-pointer">
                @if ($package->image)
                    <div class="mt-2">
                        <img src="{{ asset($package->image) }}" class="w-32 h-24 object-cover rounded border" alt="Current Image">
                    </div>
                @endif
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-white mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full rounded border-gray-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white">{{ old('description', $package->description) }}</textarea>
        </div>

        <div class="pt-6 flex justify-end gap-3">
            <a href="{{ route('packages.index') }}" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded">Update Package</button>
        </div>
    </form>
</section>
@endsection
