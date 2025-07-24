@extends('admin._layouts.master')

@section('head')
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-R+NjbH4oVkglSfy2EqIDxMXEXXdMT9gxDP7fNV0zddSc6z4qL+yIhnzOdL45KhJeZOEJNdO8GcM5RDIoxmI2BQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('body')
<div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Manage Destinations</h2>
        <a href="{{ route('admin.destinations.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            + Add Destination
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table id="destinationsTable" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                @forelse ($destinations as $destination)
                <tr>
                    <td class="px-4 py-3">
                        <img src="{{ asset('storage/' . $destination->image) }}" class="w-24 h-16 object-cover rounded shadow-sm" alt="Destination Image">
                    </td>
                    <td class="px-4 py-3">{{ $destination->title }}</td>
                    <td class="px-4 py-3">{{ $destination->slug }}</td>
                    <td class="px-4 py-3">{{ \Illuminate\Support\Str::limit($destination->description, 50) }}</td>
                    <td class="px-4 py-3 flex justify-center space-x-2">
                        <!-- Edit Button -->
                        <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="text-green-600 hover:text-blue-800"  title="Edit">
                            <i class="fas fa-pen-to-square p-2">Edit</i>
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete this destination?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                <i class="fas fa-trash">Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">No destinations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#destinationsTable').DataTable({
            responsive: true
        });
    });
</script>
@endsection
