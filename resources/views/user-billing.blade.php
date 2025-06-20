<!-- resources/views/user-billing.blade.php -->
@extends('layouts.main')

@section('title', 'User-Billing Page')

@section('content')

@include('includes.navbar3')

<!-- Start Hero -->
<section class="relative lg:pb-24 pb-16 md:mt-[84px] mt-[70px]">
    <div class="container md:!px-3 !px-0 relative">
        <div class="relative overflow-hidden md:rounded-md shadow-sm dark:shadow-gray-800 h-52 bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset('assets/images/bg/cta.jpg') }}');"></div>
    </div><!--end container-->

    <div class="container relative md:mt-24 mt-16">
        <div class="md:flex">
            <div class="lg:w-1/4 md:w-1/3 md:px-3">
                <div class="relative md:-mt-48 -mt-32">
                    <div class="p-6 rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900">
                        <div class="profile-pic text-center mb-5">
                            <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                            <div>
                                <div class="relative h-28 w-28 mx-auto">
                                    <img src="{{ asset('assets/images/client/16.jpg') }}" class="rounded-full shadow-sm dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>

                                <div class="mt-4">
                                    <h5 class="text-lg font-semibold">Jesus Zamora</h5>
                                    <p class="text-slate-400">jesus@hotmail.com</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 dark:border-gray-700">
                            <ul class="list-none sidebar-nav mb-0 pb-0" id="navmenu-nav">
                                    
                                <!-- includes/Pages/nav.blade.php -->
                                @include('includes.Pages.nav')

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-6 md:mt-0">
                <div class="p-6 rounded-md shadow-sm dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    <h6 class="text-slate-400 mb-0">The following addresses will be used on the checkout page by default.</h6>
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-6">
                        <div class="">
                            <div class="flex items-center mb-4 justify-between">
                                <h5 class="text-xl font-medium">Billing Address:</h5>
                                <a href="#" class="text-orange-500 text-lg"><i data-feather="edit" class="size-4"></i></a>
                            </div>
                            <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                                <p class="text-lg font-medium mb-2">Jesus Zamora</p>

                                <ul class="list-none">
                                    <li class="flex">
                                        <i data-feather="map-pin" class="size-4 me-2 mt-1"></i>
                                        <p class="text-slate-400">C/54 Northwest Freeway, Suite 558, <br> Houston, USA 485</p>
                                    </li>

                                    <li class="flex mt-1">
                                        <i data-feather="phone" class="size-4 me-2 mt-1"></i>
                                        <p class="text-slate-400">+123 897 5468</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="">
                            <div class="flex items-center mb-4 justify-between">
                                <h5 class="text-xl font-medium">Shipping Address:</h5>
                                <a href="#" class="text-orange-500 text-lg"><i data-feather="edit" class="size-4"></i></a>
                            </div>
                            <div class="pt-4 border-t border-gray-100 dark:border-gray-700">
                                <p class="text-lg font-medium mb-2">Jesus Zamora</p>

                                <ul class="list-none">
                                    <li class="flex">
                                        <i data-feather="map-pin" class="size-4 me-2 mt-1"></i>
                                        <p class="text-slate-400">C/54 Northwest Freeway, Suite 558, <br> Houston, USA 485</p>
                                    </li>

                                    <li class="flex mt-1">
                                        <i data-feather="phone" class="size-4 me-2 mt-1"></i>
                                        <p class="text-slate-400">+123 897 5468</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->
@endsection