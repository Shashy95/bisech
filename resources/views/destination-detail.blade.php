@extends('layouts.main')

@section('title', $destination->title ?? 'Destination Detail')

@section('content')
    @include('includes.navbar')

    <!-- Hero Section -->
    <section class="relative w-full py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ asset('assets/images/bg/cta.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
        <div class="container relative z-10 text-center">
            <h3 class="text-3xl font-semibold text-white mt-10">
                {{ $destination->title ?? 'Explore Our Tour Package' }}
            </h3>

            <div class="absolute bottom-5 left-0 right-0 text-center">
                <ul class="inline-flex space-x-1 text-sm uppercase text-white/50 font-bold">
                    <li><a href="{{ url('/') }}" class="hover:text-white">Home</a></li>
                    <li><span>&rsaquo;</span></li>
                    <li class="text-white">{{ $destination->title ?? 'Tour' }}</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="relative md:py-24 py-16">
        <div class="container">
            <div class="grid md:grid-cols-12 gap-6">
                
                <!-- Destination Info -->
                <div class="lg:col-span-8 md:col-span-7">
                    @if($destination->image)
                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}" class="w-full rounded-md shadow mb-6 object-cover">
                    @endif

                    <h5 class="text-2xl font-semibold text-slate-800 dark:text-white">{{ $destination->title }}</h5>

                    @if($destination->paragraph)
                        <p class="text-slate-500 dark:text-slate-300 mt-4">{{ $destination->paragraph }}</p>
                    @endif

                    @if($destination->description)
                        <div class="mt-6">
                            <h5 class="text-lg font-semibold text-slate-800 dark:text-white">Tour Description</h5>
                            <p class="text-slate-500 dark:text-slate-300 mt-3">{{ $destination->description }}</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4 md:col-span-5">
                    <div class="sticky top-20 bg-white dark:bg-slate-900 p-5 rounded-md shadow-md">
                        <a href="{{ url('/') }}" class="w-full block bg-red-500 hover:bg-red-600 text-white text-center py-2 rounded-md font-semibold transition">
                            Order Service
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
