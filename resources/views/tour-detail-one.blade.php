@extends('layouts.main')

@section('title', $tour->title ?? 'Tour Detail')

@section('content')
@include('includes.navbar')

<!-- Start Hero -->
<section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ asset('assets/images/bg/cta.jpg') }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-3xl leading-normal tracking-wider font-semibold text-white">
                {{ $tour->title ?? 'Explore Our Tour Package' }}
            </h3>
        </div>
    </div>
    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li class="inline-block uppercase text-[13px] font-bold text-white/50 hover:text-white">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="inline-block text-base text-white/50 mx-0.5">
                <i class="mdi mdi-chevron-right"></i>
            </li>
            <li class="inline-block uppercase text-[13px] font-bold text-white" aria-current="page">{{ $tour->title ?? 'Tour' }}</li>
        </ul>
    </div>
</section>
<!-- End Hero -->

<!-- Start -->
<section class="relative md:py-24 py-16">
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-8 md:col-span-7">
                <img src="{{ asset('storage/' . $tour->image) }}" class="w-full rounded-md shadow-sm object-cover mb-6" alt="{{ $tour->title }}" />

                <h5 class="text-2xl font-semibold">{{ $tour->title }}</h5>
                <p class="text-slate-400 mt-4">{{ $tour->paragraph }}</p>

                <div class="mt-6">
                    <h5 class="text-lg font-semibold">Tour Description:</h5>
                    <p class="text-slate-400 mt-3">{{ $tour->description }}</p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-4 md:col-span-5">
                <div class="p-5 rounded-md shadow-md sticky top-20 bg-white dark:bg-slate-900">

                    <a href="{{ url('/') }}" class="w-full block bg-red-500 hover:bg-red-600 text-white text-center py-2 rounded-md font-semibold transition">Order Service</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
