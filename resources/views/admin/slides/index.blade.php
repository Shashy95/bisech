@extends('admin._layouts.master')

@section('body')
<div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">Manage Slides</h2>
        <a href="{{ route('admin.slides.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            + Add Slide
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-medium">
            {{ session('success') }}
        </div>
    @endif

    <table id="slidesTable" class="display w-full">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slides as $slide)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $slide->image) }}" class="w-24 h-16 object-cover rounded shadow-sm" alt="Slide Image">
                </td>
                <td>{{ $slide->title }}</td>
                <td>{{ $slide->subtitle }}</td>
                <td>{{ \Illuminate\Support\Str::limit($slide->description, 50) }}</td>
                <td class="space-x-2 text-center flex items-center justify-center">
                    <!-- Edit Button -->
                    <a href="{{ route('admin.slides.edit', $slide->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                        <i class="fas fa-pen-to-square"></i>
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" class="inline"
                          onsubmit="return confirm('Delete this slide?')">
                        @csrf
                        @method('DELETE')
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
        $('#slidesTable').DataTable({ responsive: true });
    });
</script>
@endsection
