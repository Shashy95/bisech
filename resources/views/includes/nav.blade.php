<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky {{ !empty($withTopbar) ? 'tagline-height' : '' }}">
    <div class="container relative">
        <!-- Logo container-->
        <a class="logo" href="{{ url('/') }}">
            <span class="inline-block dark:hidden">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="h-7 l-dark" alt="">
                <img src="{{ asset('assets/images/logo.jpg') }}" class="h-7 l-light" alt="">
            </span>
            <span class="display-none font-bold text-red-500 text-2xl uppercase">{{ config('site.name') }}</span>
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
            <ul class="navigation-menu nav-right !justify-end {{ !empty($withTopbar) ? 'nav-light' : '' }}">

                <li><a href="{{ url('/') }}" class="sub-menu-item">Home</a></li>

                <li><a href="{{ url('/aboutus') }}" class="sub-menu-item">About Us</a></li>

                <li><a href="{{ url('/contact') }}" class="sub-menu-item">Contact Us</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->