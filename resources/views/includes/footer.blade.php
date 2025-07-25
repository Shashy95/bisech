<!-- Footer Start -->
<footer class="footer bg-slate-900 dark:bg-slate-800 relative text-gray-200 dark:text-gray-200">    
    <div class="container relative">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-6">
                         
                        <div class="lg:col-span-3 md:col-span-12">
                           <h5 class="tracking-[1px] text-gray-100 font-semibold">About Bistech</h5>
                            <p class="mt-6 text-gray-300">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
                            <ul class="list-none mt-6">
                                <li class="inline"><a href="http://linkedin.com/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-gray-700 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="linkedin" class="size-4 align-middle" title="Linkedin"></i></a></li>
                                <li class="inline"><a href="https://facebook.com/bisechcompany-377483546232683/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-gray-700 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a></li>
                                <li class="inline"><a href="https://www.instagram.com/bisechtour/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-gray-700 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a></li>
                                <li class="inline"><a href="https://twitter.com/" target="_blank" class="size-8 inline-flex items-center justify-center tracking-wide align-middle text-base border border-gray-800 dark:border-gray-700 rounded-md hover:bg-red-500 hover:text-white text-slate-300"><i data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a></li>
                            </ul><!--end icon-->
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <div class="lg:ms-8">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Office</h5>

                                <div class="flex mt-4">
                                    <i data-feather="map-pin" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <h6 class="text-gray-300">DERM Plaza,7th Floor <br> Makumbusho, <br> Dar es Salaam, Tanzania</h6>
                                    </div>
                                </div>

                                <div class="flex mt-4">
                                    <i data-feather="mail" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <a href="mailto:info@bisech.co.tz" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">info@bisech.co.tz</a>
                                    </div>
                                </div>
                
                                <div class="flex mt-4">
                                    <i data-feather="phone" class="size-4 text-red-500 me-2 mt-1"></i>
                                    <div class="">
                                        <a href="tel:+255718420969" class="text-slate-300 hover:text-slate-400 duration-500 ease-in-out">+255 718 420 969</a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
        
                        <div class="lg:col-span-3 md:col-span-4">
                            <div class="lg:ms-8">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><a href="{{ url('/aboutus') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> About us</a></li>
                                    <li class="mt-[10px]"><a href="" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Services</a></li>
                                    <li class="mt-[10px]"><a href="" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Team</a></li>
                                    {{--
                                    <li class="mt-[10px]"><a href="" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                                    <li class="mt-[10px]"><a href="{{ url('/blogs') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                                    <li class="mt-[10px]"><a href="{{ url('/login') }}" class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i class="mdi mdi-chevron-right"></i> Login</a></li>
                                    --}}
                                </ul>
                            </div>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                            <p class="mt-6">Sign up and receive the latest tips via email.</p>
                            <form>
                                <div class="grid grid-cols-1">
                                    <div class="my-3">
                                        <label class="form-label">Write your email <span class="text-red-600">*</span></label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                            <input type="email" class="ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 dark:bg-gray-700 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none" placeholder="Email" name="email" required="">
                                        </div>
                                    </div>
                                
                                    <button type="submit" id="submitsubscribe" name="send" class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center bg-red-500 text-white rounded-md">Subscribe</button>
                                </div>
                            </form>
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
                    <p class="mb-0">© {{ date('Y') }} Bisech. Design & Develop with <i class="mdi mdi-heart text-red-600"></i> by <a href="https://shreethemes.in/" target="_blank" class="text-reset">Shreethemes</a>.</p>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </div>
</footer><!--end footer-->
<!-- Footer End -->