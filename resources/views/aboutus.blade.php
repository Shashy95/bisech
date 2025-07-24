@extends('layouts.main')

@section('title', 'About Us Page')

@section('content')

@include('includes.navbar')
        
<!-- Start Hero -->
<section class="relative table w-full items-center py-36 bg-top bg-no-repeat bg-cover" style="background-image: url('{{ asset('assets/images/bg/cta.jpg') }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-slate-900/80 to-slate-900"></div>
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="text-4xl leading-normal tracking-wider font-semibold text-white">Bisech Agency</h3>
        </div>
    </div>
    
    <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
        <ul class="tracking-[0.5px] mb-0 inline-block">
            <li class="inline-block uppercase text-[13px] font-bold text-white/50 hover:text-white"><a href="{{ url('/') }}">Bisech</a></li>
            <li class="inline-block text-base text-white/50 mx-0.5"><i class="mdi mdi-chevron-right"></i></li>
            <li class="inline-block uppercase text-[13px] font-bold text-white">About Us</li>
        </ul>
    </div>
</section>
<!-- End Hero -->

<!-- Start About Section -->
<section class="relative md:py-24 py-16">
    <div class="container relative">
        <!-- About Content -->
        @include('includes.Hero.about')
    </div>

    <!-- Mission and Vision Section -->
    <div class="container relative md:mt-24 mt-16">
        <div class="grid grid-cols-1 text-center pb-10">
            <h3 class="mb-6 md:text-3xl text-2xl font-semibold">Our Mission & Vision</h3>
            <p class="text-slate-500 max-w-2xl mx-auto mb-12">
                At Bisech Agency, we are driven by purpose and foresight to deliver exceptional travel experiences and long-lasting impact.
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Mission -->
            <div class="bg-gray-100 dark:bg-slate-800 p-6 rounded-xl shadow-md">
                <h4 class="text-xl font-bold text-red-600 mb-4">Our Mission</h4>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                   To deliver unparalleled car rental
and travel experiences that delight
our customers and create lasting
memories. We strive to be the pre-
mier choice by consistently provi-
ding exceptional service, innovati-
ve solutions, and remarkable expe-
riences that inspire wonder and
foster deep customer loyalty
                </p>
            </div>

            <!-- Vision -->
            <div class="bg-gray-100 dark:bg-slate-800 p-6 rounded-xl shadow-md">
                <h4 class="text-xl font-bold text-red-600 mb-4">Our Vision</h4>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                 

To be the premier provider of
exceptional car rental and travel
experiences that inspire wonder
and create lifelong memories for
our customers.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

<!-- Start Core Values Section -->
<section class="bg-white dark:bg-gray-900 pb-20">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-red-600">Our Core Values</h2>
            <p class="max-w-2xl mx-auto mt-2 text-gray-600 dark:text-gray-300">
                We are guided by principles that ensure quality, safety, sustainability, and community collaboration.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8 text-white">
            <!-- Safety and Comfort -->
            <div class="bg-red-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-4">Safety and Comfort</h3>
                <ul class="list-disc pl-5 space-y-2 text-sm leading-relaxed">
                    <li>Client safety and comfort is our top priority.</li>
                    <li>All staff undergo safety training to ensure high-quality service delivery.</li>
                    <li>Clients are provided with emergency contact numbers to report unsafe behavior.</li>
                    <li>Drivers and staff receive regular safety inductions and reminders.</li>
                    <li>Alcohol consumption is strictly prohibited during working hours.</li>
                    <li>Fatigue management is emphasized for long journeys.</li>
                    <li>All vehicles are equipped with fire extinguishers and essential safety tools.</li>
                    <li>Seat belts are mandatory for drivers and passengers at all times.</li>
                </ul>
            </div>

            <!-- Integrity -->
            <div class="bg-red-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-4">Integrity</h3>
                <ul class="list-disc pl-5 space-y-2 text-sm leading-relaxed">
                    <li>We act with honesty and integrity in all dealings.</li>
                    <li>No tolerance for dishonest behavior or cheating.</li>
                    <li>We ensure client trust and the safety of their belongings.</li>
                </ul>
            </div>

            <!-- Partnerships -->
            <div class="bg-red-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-4">Partnerships</h3>
                <ul class="list-disc pl-5 space-y-2 text-sm leading-relaxed">
                    <li>We collaborate with local communities in our areas of operation.</li>
                    <li>We build strong business partnerships for expanded service reach.</li>
                    <li>These ensure smooth, secure client and asset transfers.</li>
                </ul>
            </div>

            <!-- Environmental Stewardship -->
            <div class="bg-red-600 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-4">Environmental Stewardship</h3>
                <ul class="list-disc pl-5 space-y-2 text-sm leading-relaxed">
                    <li>We strive to minimize our environmental impact.</li>
                    <li>We support climate change mitigation efforts.</li>
                    <li>We use fuel-efficient, low-emission vehicles.</li>
                    <li>We reduce waste in all our services.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Core Values Section -->

@endsection
