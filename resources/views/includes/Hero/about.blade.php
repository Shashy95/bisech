<div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
    <div class="md:col-span-5">
        <div class="relative">
            <img src="{{ asset('assets/images/about.jpg') }}" class="mx-auto rounded-3xl shadow-sm dark:shadow-gray-700 w-[90%]" alt="">
            

            <div class="absolute flex items-center bottom-16 md:-start-10 -start-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-56 m-3">
                <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                    <i data-feather="users" class="size-6"></i>
                </div>
                <div class="flex-1">
                    <span class="text-slate-400">Car hire · Tours · Flights</span>
                    <p class="text-lg font-bold">One team, one quote</p>
                </div>
            </div>

            <div class="absolute flex items-center top-16 md:-end-10 -end-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-60 m-3">
                <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                    <i data-feather="globe" class="size-6"></i>
                </div>
                <div class="flex-1">
                    <span class="text-slate-400">Based in Dar es Salaam</span>
                    <p class="text-lg font-bold">Local team, local knowledge</p>
                </div>
            </div>
        </div>
    </div>

    <div class="md:col-span-7">
        <div class="lg:ms-8">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Your Tanzania <br> Travel Partner</h3>

            <p class="text-slate-400 max-w-xl mb-6">
               {{ config('site.name') }} is a Tanzanian travel company covering car hire, flight booking and guided trips, from Kilimanjaro treks to Zanzibar beach stays.
                <br><br>Tell us your dates, group size and budget. We plan the route, arrange the vehicle, flights and stays, and stay reachable while you travel.
            </p>

            <a href="{{ route('about') }}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Read More <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
        </div>
    </div>

    <div class="absolute bottom-0 start-1/3 -z-1">
        <img src="{{ asset('assets/images/map-plane-big.png') }}" class="lg:w-[600px] w-96" alt="">
    </div>
</div>