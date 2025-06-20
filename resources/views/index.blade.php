<!-- resources/views/index.blade.php -->
@extends('layouts.main')

@section('title', 'Index Page')

@section('content')

@include('includes.navbar')
  
<!-- Hero Start -->
<section class="relative md:pt-72 md:pb-60 py-36 table w-full items-center bg-top bg-no-repeat bg-cover" style="background-image: url('{{ asset('assets/images/bg/1.jpg') }}');">
    <div class="absolute inset-0 bg-slate-900/40"></div>
    <div class="container relative">
        <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
            <div class="lg:col-span-8 md:col-span-7 md:order-1 order-2">
                <h5 class="text-3xl !font-dancing text-white">Beauty of Discover</h5>
                <h4 class="font-bold text-white lg:leading-normal leading-normal text-4xl lg:text-6xl mb-6 mt-5">Let's Leave The Road, <br> And Take The Travosy</h4>
                <p class="text-white/70 text-xl max-w-xl">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
            </div>

            <div class="lg:col-span-4 md:col-span-5 md:text-center md:order-2 order-1">
                <a href="#!" data-type="youtube" data-id="S_CGed6E610" class="lightbox lg:h-24 h-20 lg:w-24 w-20 rounded-full shadow-lg dark:shadow-gray-800 inline-flex items-center justify-center bg-white hover:bg-red-500 text-red-500 hover:text-white duration-500 ease-in-out mx-auto">
                    <i class="mdi mdi-play inline-flex items-center justify-center text-3xl"></i>
                </a>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- Hero End -->

<div class="container relative -mt-16 z-1">
    <div class="grid grid-cols-1">
        <form class="p-6 bg-white dark:bg-slate-900 rounded-xl shadow-sm dark:shadow-gray-700">
            <div class="registration-form text-slate-900 text-start">
                <div class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-4">
                    <div>
                        <label class="form-label font-medium text-slate-900 dark:text-white">Search:</label>
                        <div class="relative mt-2">
                            <i data-feather="search" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                            <input name="name" type="text" id="job-keyword" class="w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="Search">
                        </div>
                    </div>

                    <div>
                        <label class="form-label font-medium text-slate-900 dark:text-white">Select Your Date:</label>
                        <div class="relative mt-2">
                            <i data-feather="calendar" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                            <input name="name" type="text" id="job-keyword" class="w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 start" placeholder="Select Your Date">
                        </div>
                    </div>

                    <div>
                        <label class="form-label font-medium text-slate-900 dark:text-white">Select Your Date:</label>
                        <div class="relative mt-2">
                            <i data-feather="calendar" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                            <input name="name" type="text" id="job-keyword" class="w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 end" placeholder="Select Your Date">
                        </div>
                    </div>

                    <div>
                        <label class="form-label font-medium text-slate-900 dark:text-white">No. of person:</label>
                        <div class="relative mt-2">
                            <i data-feather="users" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                            <select class="form-select w-full py-2 px-3 ps-10 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded-md outline-none border border-gray-100 dark:border-gray-800 focus:ring-0">
                                <option disabled selected>No. of person</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>

                    <div class="lg:mt-[35px]">
                        <input type="submit" id="search-buy" name="search" class="py-1 px-5 h-10 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md w-full cursor-pointer" value="Search">
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </form><!--end form-->
    </div><!--end grid-->
</div><!--end container-->
<!-- End Hero -->

<!-- Start -->
<section class="relative md:py-24 py-16 overflow-hidden">
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Top Destinations</h3>

            <p class="text-slate-400 max-w-xl mx-auto">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
        </div><!--end grid-->

        <div class="grid grid-cols-1 relative mt-6">
            <div class="tiny-five-item">
                
                <!-- includes/Hero/top-destinations.blade.php -->
                @include('includes.Hero.top-destinations')

            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Tours Packages</h3>

            <p class="text-slate-400 max-w-xl mx-auto">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
        </div><!--end grid-->

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-6 gap-6">

            <!-- includes/Hero/tours-packages.blade.php -->
            @include('includes.Hero.tours-packages')

        </div><!--end grid-->

        <div class="mt-6 text-center">
            <a href="{{ url('/grid-right-sidebar') }}" class="text-slate-400 hover:text-red-500 inline-block">See More Tours <i class="mdi mdi-arrow-right align-middle"></i></a>
        </div>
    </div><!--end container-->

    <div class="container relative md:mt-24 mt-16">
        
        <!-- includes/Hero/about.blade.php -->
        @include('includes.Hero.about')
    
    </div><!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-6 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">What Our Users Say</h3>

            <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome template, you can replace it with any text.</p>
        </div><!--end grid-->

        <div class="grid grid-cols-1 mt-6">
            <div class="tiny-three-item">
                
                <!-- includes/Hero/reviews.blade.php -->
                @include('includes.Hero.reviews')

            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-6 text-center">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Travel Blogs</h3>

            <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome template, you can replace it with any text.</p>
        </div><!--end grid-->

        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-6 gap-6">
            
            <!-- includes/Hero/blog.blade.php -->
            @include('includes.Hero.blog')

        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End -->

@endsection