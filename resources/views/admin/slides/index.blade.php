@extends('admin._layouts.master')

@section('body')
<div class="max-w-6xl mx-auto bg-white shadow rounded p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold"> Manage Slides</h2>
        <button onclick="openCreateModal()" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            + Add Slide
        </button>
    </div>

    <table id="slidesTable" class="display w-full">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slides as $slide)
         <tr>
    <td><img src="{{ $slide->image }}" class="w-24 h-16 object-cover rounded shadow-sm" alt=""></td>
    <td>{{ $slide->title }}</td>
    <td>{{ $slide->subtitle }}</td>
    <td>{{ \Illuminate\Support\Str::limit($slide->description, 50) }}</td>
    <td class="space-x-2 text-center flex items-center justify-center">
        <!-- Edit Button -->
        <button onclick="openEditModal({{ $slide->id }}, '{{ addslashes($slide->title) }}', '{{ addslashes($slide->subtitle) }}', '{{ addslashes($slide->description) }}')"
                class="text-blue-600 hover:text-blue-800" title="Edit">
            <i class="fas fa-pen-to-square"></i>
        </button>

        <!-- Delete Button -->
        <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST" class="inline"
              onsubmit="return confirm('Delete this slide?')">
            @csrf @method('DELETE')
            <button type="submit" class=":text-red-600 hover:text-red-800" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>

            @endforeach
        </tbody>
    </table>
</div>

@include('admin.slides._modal-create')
@include('admin.slides._modal-edit')
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#slidesTable').DataTable({ responsive: true });
    });

    function openCreateModal() {
        document.getElementById('createModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function openEditModal(id, title, subtitle, description) {
        document.getElementById('edit_id').value = id;
        document.getElementById('edit_title').value = title;
        document.getElementById('edit_subtitle').value = subtitle;
        document.getElementById('edit_description').value = description;

        document.getElementById('editModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection
