@extends('admin._layouts.master')

@section('body')
<div class="max-w-5xl mx-auto bg-white shadow rounded p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Items</h2>
        <button onclick="openModal()" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors">
            + Add Item
        </button>
    </div>

    <table id="itemsTable" class="display w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
            </tr>
        </thead>
    </table>
</div>

<!-- Modal -->
<div id="createModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Backdrop -->
        <div id="modalBackdrop" 
             class="fixed inset-0 transition-opacity" 
             aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal Content -->
        <div id="modalContent"
             class="hidden inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
             role="dialog" 
             aria-modal="true" 
             aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="flex justify-between items-start">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                        Create New Item
                    </h3>
                    <button type="button" onclick="closeModal()" class="ml-4 text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <form id="createForm" class="mt-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Name</label>
                        <input name="name" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500" required></textarea>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" form="createForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Save
                </button>
                <button type="button" onclick="closeModal()" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let table;
    let idCounter = 100;

    const dummyData = [
        { id: 1, name: "Sample Item 1", description: "First item description", created_at: "2025-06-01" },
        { id: 2, name: "Sample Item 2", description: "Second item description", created_at: "2025-06-15" },
        { id: 3, name: "Sample Iatem 3", description: "Third item description", created_at: "2025-06-20" },
    ];

    $(document).ready(function () {
        table = $('#itemsTable').DataTable({
            data: dummyData,
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'description' },
                {
                    data: 'created_at',
                    render: function (data, type, row) {
                        const date = new Date(data);
                        return `${String(date.getDate()).padStart(2, '0')}/${String(date.getMonth() + 1).padStart(2, '0')}/${date.getFullYear()}`;
                    }
                },
            ],
            processing: true,
            serverSide: false,
            responsive: true,
            searching: true
        });

        $('#createForm').on('submit', function (e) {
            e.preventDefault();

            const name = $(this).find('input[name="name"]').val();
            const description = $(this).find('textarea[name="description"]').val();

            const newItem = {
                id: ++idCounter,
                name,
                description,
                created_at: new Date().toISOString().split('T')[0],
            };

            table.row.add(newItem).draw(false);
            closeModal();
            this.reset();
        });
    });

    function openModal() {
        const modal = document.getElementById('createModal');
        const backdrop = document.getElementById('modalBackdrop');
        const content = document.getElementById('modalContent');
        
        // Show modal container
        modal.classList.remove('hidden');
        
        // Trigger backdrop transition
        setTimeout(() => {
            backdrop.classList.add('opacity-75');
            backdrop.classList.remove('opacity-0');
        }, 10);
        
        // Show content with animation
        content.classList.remove('hidden');
        content.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        content.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        
        // Disable body scroll
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        const modal = document.getElementById('createModal');
        const backdrop = document.getElementById('modalBackdrop');
        const content = document.getElementById('modalContent');
        
        // Hide content with animation
        content.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        content.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        
        // Hide backdrop
        backdrop.classList.remove('opacity-75');
        backdrop.classList.add('opacity-0');
        
        // Hide modal after animations complete
        setTimeout(() => {
            modal.classList.add('hidden');
            content.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 200);
    }

    // Close modal when clicking on backdrop
    document.getElementById('modalBackdrop').addEventListener('click', closeModal);

    // Prevent modal from closing when clicking inside modal content
    document.getElementById('modalContent').addEventListener('click', function(e) {
        e.stopPropagation();
    });
</script>
@endsection