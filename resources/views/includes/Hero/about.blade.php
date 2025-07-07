<div class="grid md:grid-cols-12 grid-cols-1 items-center gap-6 relative">
    <div class="md:col-span-5">
        <div class="relative">
            <img src="{{ asset('assets/images/about.jpg') }}" class="mx-auto rounded-3xl shadow-sm dark:shadow-gray-700 w-[90%]" alt="">
            

            <div class="absolute flex items-center bottom-16 md:-start-10 -start-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-56 m-3">
                <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                    <i data-feather="users" class="size-6"></i>
                </div>
                <div class="flex-1">
                    <span class="text-slate-400">Visitor</span>
                    <p class="text-xl font-bold"><span class="counter-value" data-target="4589">2100</span></p>
                </div>
            </div>

            <div class="absolute flex items-center top-16 md:-end-10 -end-5 p-4 rounded-lg shadow-md dark:shadow-gray-800 bg-white dark:bg-slate-900 w-60 m-3">
                <div class="flex items-center justify-center h-[65px] min-w-[65px] bg-red-500/5 text-red-500 text-center rounded-xl me-3">
                    <i data-feather="globe" class="size-6"></i>
                </div>
                <div class="flex-1">
                    <span class="text-slate-400">Travel Packages</span>
                    <p class="text-xl font-bold"><span class="counter-value" data-target="50">1</span>+</p>
                </div>
            </div>
        </div>
    </div>

    <div class="md:col-span-7">
        <div class="lg:ms-8">
            <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">World Best Travel <br> Agency: Bisech</h3>

            <p class="text-slate-400 max-w-xl mb-6">
               Bisech Investments Co. Limited is a registered limited liability Company
                incorporated in the United Republic of Tanzania under Companies, Ordinance (CAP 212) with Certificate of Registration No . 69057.
                <br><br>The Company was formed due to the emerging opportunities in Car Hire and Tourism business responding to the development of Tourism sector and other Business sectors in the Country. 
            </p>

            <a href="{{ route('about') }}" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Read More <i class="mdi mdi-chevron-right align-middle ms-0.5"></i></a>
        </div>
    </div>

    <div class="absolute bottom-0 start-1/3 -z-1">
        <img src="{{ asset('assets/images/map-plane-big.png') }}" class="lg:w-[600px] w-96" alt="">
    </div>
</div>