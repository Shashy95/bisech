<!-- resources/views/404.blade.php -->
@extends('layouts.no-header')

@section('title', '404 Page')

@section('content')

<section class="relative bg-red-500/5">
    <div class="container-fluid relative">
        <div class="grid grid-cols-1">
            <div class="flex flex-col min-h-screen justify-center md:px-10 py-10 px-4">
                <div class="text-center">
                    <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto" alt=""></a>
                </div>
                <div class="title-heading text-center my-auto">
                    <img src="{{ asset('assets/images/maintenance.svg') }}" class="mx-auto w-96" alt="">
                    <h1 class="my-6 md:text-4xl text-3xl font-bold">Page Not Found?</h1>
                    <p class="text-slate-400">Whoops, this is embarassing. <br> Looks like the page you were looking for wasn't found.</p>
                    
                    <div class="mt-4">
                        <a href="{{ url('/') }}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Back to Home</a>
                    </div>
                </div>
                <div class="text-center">
                    <p class="mb-0 text-slate-400">© {{ date('Y') }} Travosy. Design & Develop with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->

@endsection