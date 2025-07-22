@extends('admin._layouts.master')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">All Packages</h2>
        <a href="{{ route('admin.packages.create') }}" class="inline-block px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700">
            + Add New Package
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white dark:bg-asslate-800 shadow-md rounded-lg">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-gray-100 dark:bg-slate-700">
                <tr class="text-left text-sm text-gray-700 dark:text-white">
                    <th class="px-4 py-3">Image</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Location</th>
                    <th class="px-4 py-3">Category</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Discount</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 text-sm text-gray-800 dark:text-gray-200">
                @forelse($packages as $package)
                    <tr>
                        <td class="px-4 py-3">
                            <img src="{{ asset($package->image) }}" alt="Package Image" class="w-20 h-14 object-cover rounded shadow">
                        </td>
                        <td class="px-4 py-3">{{ $package->title }}</td>
                        <td class="px-4 py-3">{{ $package->location }}</td>
                        <td class="px-4 py-3">{{ $package->category }}</td>
                        <td class="px-4 py-3">{{ $package->price }}</td>
                        <td class="px-4 py-3">
                            @if ($package->discount && $package->discount !== 'false')
                                <span class="text-red-500 font-medium">{{ $package->discount }}</span>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('packages.edit', $package->id) }}" class="text-indigo-600 hover:text-indigo-800" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M15.232 5.232l3.536 3.536M9 11l3.232-3.232a1 1 0 011.415 0l3.536 3.536a1 1 0 010 1.415L13 15H9v-4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>

                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this package?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m5 0H4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center px-4 py-6 text-gray-500 dark:text-gray-400">No packages available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
