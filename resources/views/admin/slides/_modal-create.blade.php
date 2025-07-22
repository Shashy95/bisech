<!-- Edit Modal -->
<div id="editModal"
     class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm flex items-center justify-center px-4">
     
    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-xl border border-gray-200">

        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4">
            <h3 class="text-lg font-semibold text-gray-800">Edit Slide</h3>
            <button type="button" onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">
                &times;
            </button>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('admin.slides.update', 0) }}"
              enctype="multipart/form-data"
              onsubmit="this.action = this.action.replace('0', document.getElementById('edit_id').value)">
            @csrf
            @method('PUT')

            <!-- Hidden Slide ID -->
            <input type="hidden" name="id" id="edit_id">

            <!-- Body -->
            <div class="px-6 py-4 space-y-4">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input name="title" id="edit_title" type="text"
                           class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Subtitle</label>
                    <input name="subtitle" id="edit_subtitle" type="text"
                           class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="edit_description"
                              class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500"
                              rows="3"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Replace Image (optional)</label>
                    <input name="image" type="file" accept="image/*"
                           class="w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-2 px-6 py-4 bg-gray-50 rounded-b-lg">
                <button type="button" onclick="closeModal('editModal')"
                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
