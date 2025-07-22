<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="referrer" content="always" />
    <meta name="description" content="" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('assets/css/tailwind.css') }}" rel="stylesheet" />

    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- DataTables & jQuery -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


    <!-- Alpine.js and cloak fix -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body>
    <div x-data="{ sidebarOpen: false }" class="flex min-h-screen bg-gray-200 font-roboto">
        <!-- Sidebar -->
        <div
            x-cloak
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto bg-gray-900 transform transition-transform duration-300 ease-in-out
                   lg:translate-x-0 lg:static lg:z-auto"
        >
            @include('admin._layouts.sidebar')
        </div>

        <!-- Backdrop (for mobile) -->
        <div
            x-cloak
            x-show="sidebarOpen"
            @click="sidebarOpen = false"
            class="fixed inset-0 z-20  bg-opacity-50 lg:hidden"
        ></div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out lg:ml-64">
            @include('admin._layouts.header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                  @if (session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-300 text-red-800">
            {{ session('error') }}
        </div>
    @endif


                <div class="container mx-auto px-6 py-8">
                    @yield('body')
                </div>
            </main>
        </div>
    </div>

   <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @yield('scripts')
</body>
</html>
