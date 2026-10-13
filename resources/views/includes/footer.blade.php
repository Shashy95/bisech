<!-- Footer Start -->
<footer class="footer bg-slate-900 dark:bg-slate-800 relative text-gray-200 dark:text-gray-200">    
    <div class="container relative">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                         
                        <div class="lg:col-span-3 md:col-span-12">
                           <h5 class="tracking-[1px] text-gray-100 font-semibold">About {{ config('site.name') }}</h5>
                            <p class="mt-6 text-gray-300">Safaris, beach holidays, car hire and flight booking in Tanzania, organised for your dates and your budget.</p>
                            @php $socialIcons = ['facebook' => 'facebook', 'instagram' => 'instagram', 'twitter' => 'twitter', 'linkedin' => 'linkedin']; @endphp
                            @if (count(\App\Support\Site::social()))
                            <ul class="list-none mt-6">
                                @foreach (\App\Support\Site::social() as $network => $url)
                                <li class="inline"><a href="{{ $url }}" target="_blank" rel="noopener" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-gray-700 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="{{ $socialIcons[$network] ?? 'link' }}" class="size-4 align-middle" title="{{ $network }}"></i></a></li>
                                @endforeach
                            </ul><!--end icon-->
                            @endif
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <div class="lg:ms-8">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Office</h5>

                                <div class="flex mt-4">
                                    <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <h6 class="text-gray-300">{!! nl2br(e(\App\Support\Site::address())) !!}</h6>
                                    </div>
                                </div>

                                <div class="flex mt-4">
                                    <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        @if (\App\Support\Site::mailHref())
                                        <a href="{{ \App\Support\Site::mailHref() }}" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">{{ \App\Support\Site::email() }}</a>
                                        @else
                                        <span class="text-slate-300">{{ \App\Support\Site::email() }}</span>
                                        @endif
                                    </div>
                                </div>
                
                                <div class="flex mt-4">
                                    <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        @if (\App\Support\Site::telHref())
                                        <a href="{{ \App\Support\Site::telHref() }}" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">{{ \App\Support\Site::phone() }}</a>
                                        @else
                                        <span class="text-slate-300">{{ \App\Support\Site::phone() }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
        
                        <div class="lg:col-span-3 md:col-span-4">
                            <div class="lg:ms-8">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><a href="{{ url('/aboutus') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> About us</a></li>
                                    <li class="mt-[10px]"><a href="{{ url('/contact') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Contact us</a></li>
                                    {{--
                                    <li class="mt-[10px]"><a href="" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                                    <li class="mt-[10px]"><a href="{{ url('/blogs') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                                    <li class="mt-[10px]"><a href="{{ url('/login') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Login</a></li>
                                    --}}
                                </ul>
                            </div>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Plan your trip</h5>
                            <p class="mt-6">Tell us your dates and group size. We reply with a clear quote.</p>
                            <a href="{{ \App\Support\Site::wa('Hello ' . config('site.name') . ', I would like a quote for a trip.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif
                               class="mt-4 py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 hover:bg-red-600 text-white rounded-md">
                                {{ \App\Support\Site::hasWhatsapp() ? 'Get a quote on WhatsApp' : 'Get a quote' }}
                            </a>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end col-->
            </div>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="py-[30px] px-0 border-t border-gray-800 dark:border-gray-700">
        <div class="container relative text-center">
            <div class="grid grid-cols-1">
                <div class="text-center">
                    <p class="mb-0">© {{ date('Y') }} {{ config('site.name') }}. All rights reserved.@if (config('site.demo')) <span class="text-gray-400"> · Demo website</span>@endif</p>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- Footer End -->