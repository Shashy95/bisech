@extends('admin._layouts.master')

@section('body')
<div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Manage Destinations</h2>
        <a href="{{ route('admin.destinations.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            + Add Destination
        </a>
    </div>

    <table id="destinationsTable" class="display w-full">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($destinations as $destination)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $destination->image) }}" class="w-24 h-16 object-cover rounded shadow-sm" alt="">
                </td>
                <td>{{ $destination->title }}</td>
                <td>{{ $destination->slug }}</td>
                <td>{{ \Illuminate\Support\Str::limit($destination->description, 50) }}</td>
                <td class="space-x-2 text-center flex items-center justify-center">
                    <!-- Edit Button -->
                    <a href="{{ route('admin.destinations.edit', $destination->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                        <i class="fas fa-pen-to-square"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.destinations.destroy', $destination->id) }}" method="POST" class="inline"
                        onsubmit="return confirm('Delete this destination?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#destinationsTable').DataTable({ responsive: true });
    });

    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection
b