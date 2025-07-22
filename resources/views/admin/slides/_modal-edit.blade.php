<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-black/40">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-lg w-full p-6 relative">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Edit Slide</h3>
                <button type="button" onclick="closeModal('editModal')" class="text-gray-500 hover:text-gray-700">×</button>
            </div>

            <form method="POST" action="{{ route('admin.slides.update', ['slide' => 0]) }}" enctype="multipart/form-data"
                  onsubmit="this.action = this.action.replace('0', document.getElementById('edit_id').value)">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="edit_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium">Title</label>
                    <input name="title" id="edit_title" type="text" class="w-full border rounded p-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Subtitle</label>
                    <input name="subtitle" id="edit_subtitle" type="text" class="w-full border rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Description</label>
                    <textarea name="description" id="edit_description" rows="3" class="w-full border rounded p-2"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium">Replace Image (optional)</label>
                    <input name="image" type="file" class="w-full border rounded p-2">
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
