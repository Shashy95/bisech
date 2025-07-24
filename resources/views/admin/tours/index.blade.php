@extends('admin._layouts.master')

@section('body')
<div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
 <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-semibold">Manage Tours</h2>
    <a href="{{ route('admin.tour-packages.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
        + Add Tour
    </a>
</div>


    <table id="toursTable" class="display w-full">
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
            @foreach ($tours as $tour)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $tour->image) }}" class="w-24 h-16 object-cover rounded shadow-sm" alt="">
                </td>
                <td>{{ $tour->title }}</td>
                <td>{{ $tour->slug }}</td>
                <td>{{ \Illuminate\Support\Str::limit($tour->description, 50) }}</td>
                <td class="space-x-2 text-center flex items-center justify-center">
                    <!-- Edit Button -->
                    <a href="{{ route('admin.tour-packages.edit', $tour->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                        <i class="fas fa-pen-to-square">edit</i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.tour-packages.destroy', $tour->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('Delete this tour?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                            <i class="fas fa-trash">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- If you want modal-based forms like slides --}}
{{-- @include('admin.tours._modal-create') --}}
{{-- @include('admin.tours._modal-edit') --}}
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#toursTable').DataTable({ responsive: true });
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
