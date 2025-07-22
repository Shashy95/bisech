@extends('layouts.admin')

@section('content')
<section class="max-w-5xl mx-auto px-4 py-10">
    <div class="mb-6">
        <a href="{{ route('packages.index') }}" class="text-indigo-600 hover:underline text-sm">
            ← Back to Packages
        </a>
    </div>

    <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset($package->image) }}" alt="{{ $package->title }}" class="w-full h-72 object-cover">

        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">
                {{ $package->title }}
            </h2>

            <p class="text-sm text-slate-500 dark:text-slate-300 mb-4">
                <span class="font-semibold">Location:</span> {{ $package->location }} |
                <span class="font-semibold">Category:</span> {{ $package->category }}
            </p>

            <div class="mb-4">
                <span class="text-lg font-semibold text-indigo-600">{{ $package->price }}</span>
                @if ($package->discount && $package->discount !== 'false')
                    <span class="ml-2 bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full">{{ $package->discount }}</span>
                @endif
            </div>

            <div class="prose dark:prose-invert max-w-none">
                {!! nl2br(e($package->description)) !!}
            </div>
        </div>
    </div>
</section>
@endsection
