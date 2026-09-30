<!-- TAGLINE START-->
 <div class="tagline bg-slate-900">
    <div class="container relative">                
        <div class="grid grid-cols-1">
            <div class="flex items-center justify-between">
                <ul class="list-none">
                    <li class="inline-flex items-center">
                        <i data-feather="clock" class="text-red-500 size-4"></i>
                        <span class="ms-2 text-slate-300">Mon-Fri: 9am to 5pm</span>
                    </li>
                    <li class="inline-flex items-center ms-2">
                        <i data-feather="map-pin" class="text-red-500 size-4"></i>
                        <span class="ms-2 text-slate-300">Dar es Salaam, Tanzania</span>
                    </li>
                </ul>

                <ul class="list-none">
                    <li class="inline-flex items-center">
                        <i data-feather="mail" class="text-red-500 size-4"></i>
                        <a href="mailto:info@bisech.co.tz" class="ms-2 text-slate-300 hover:text-slate-200">info@bisech.co.tz</a>
                    </li>
                    <li class="inline-flex items-center ms-2">
                        <ul class="list-none">
                            <li class="inline-flex mb-0"><a href="https://facebook.com/bisechcompany-377483546232683/" target="_blank" class="text-slate-300 hover:text-red-500"><i data-feather="facebook" class="size-4 align-middle" title="facebook"></i></a></li>
                            <li class="inline-flex ms-2 mb-0"><a href="https://www.instagram.com/bisechtour/" target="_blank" class="text-slate-300 hover:text-red-500"><i data-feather="instagram" class="size-4 align-middle" title="instagram"></i></a></li>
                            <li class="inline-flex ms-2 mb-0"><a href="#!" target="_blank" class="text-slate-300 hover:text-red-500"><i data-feather="twitter" class="size-4 align-middle" title="twitter"></i></a></li>
                            <li class="inline-flex ms-2 mb-0"><a href="tel:+255718420969" target="_blank" class="text-slate-300 hover:text-red-500"><i data-feather="phone" class="size-4 align-middle" title="phone"></i></a></li>
                        </ul><!--end icon-->
                    </li>
                </ul>
            </div>
        </div>
    </div><!--end container-->
</div><!--end tagline-->
<!-- TAGLINE END-->
<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky tagline-height">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="{{ url('/') }}">
            <span class="inline-block dark:hidden">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="h-7 l-dark" alt="">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="h-7 l-light" alt="">
            </span>
            <span class="display-none font-bold text-red-500 text-2xl uppercase">Bistech</span>
            <img src="{{ asset('assets/images/logo.jpg') }}" class="hidden dark:inline-block" alt="">
        </a>
        <!-- End Logo container-->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Mobile Toggle -->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-right !justify-end nav-light">

                <li><a href="{{ url('/') }}" class="sub-menu-item">Home</a></li>

                <li><a href="{{ url('/aboutus') }}" class="sub-menu-item">About Us</a></li>

                {{-- Listing: label only, no link --}}
                <li>
                    <span class="sub-menu-item cursor-default select-none">Listing</span>
                </li>

                <li><a href="{{ url('/contact') }}" class="sub-menu-item">Contact Us</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->