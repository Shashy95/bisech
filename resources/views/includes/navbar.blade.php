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
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="h-7 l-dark" alt="">
                <img src="{{ asset('assets/images/logo-light.png') }}" class="h-7 l-light" alt="">
            </span>
            <img src="{{ asset('assets/images/logo-white.png') }}" class="hidden dark:inline-block" alt="">
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

                <li class="has-submenu parent-parent-menu-item"><a href="javascript:void(0)"> Listing </a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Tour Grid </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/grid') }}" class="sub-menu-item">Grid</a></li>
                                <li><a href="{{ url('/grid-left-sidebar') }}" class="sub-menu-item">Grid Left Sidebar</a></li>
                                <li><a href="{{ url('/grid-right-sidebar') }}" class="sub-menu-item">Grid Right Sidebar</a></li>
                            </ul>  
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">Tour List </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/list') }}" class="sub-menu-item">List</a></li>
                                <li><a href="{{ url('/list-left-sidebar') }}" class="sub-menu-item">List Left Sidebar</a></li>
                                <li><a href="{{ url('/list-right-sidebar') }}" class="sub-menu-item">List Right Sidebar</a></li>
                            </ul>  
                        </li>

                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)"> Tour Detail </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/tour-detail-one') }}" class="sub-menu-item">Tour Detail One</a></li>
                                <li><a href="{{ url('/tour-detail-two') }}" class="sub-menu-item">Tour Detail Two</a></li>
                            </ul>  
                        </li>
                    </ul>
                </li>
        
                <!--
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Pages</a><span class="menu-arrow"></span>
                    <ul class="submenu">


                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> My Account</a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/user-profile') }}" class="sub-menu-item">User Account</a></li>
                                <li><a href="{{ url('/user-billing') }}" class="sub-menu-item">Billing</a></li>
                                <li><a href="{{ url('/user-payment') }}" class="sub-menu-item">Payment</a></li>
                                <li><a href="{{ url('/user-invoice') }}" class="sub-menu-item">Invoice</a></li>
                                <li><a href="{{ url('/user-social') }}" class="sub-menu-item">Social</a></li>
                                <li><a href="{{ url('/user-notification') }}" class="sub-menu-item">Notification</a></li>
                                <li><a href="{{ url('/user-setting') }}" class="sub-menu-item">Setting</a></li>
                            </ul> 
                        </li>
                
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)"> Helpcenter </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/helpcenter') }}" class="sub-menu-item">Overview</a></li>
                                <li><a href="{{ url('/helpcenter-faqs') }}" class="sub-menu-item">FAQs</a></li>
                                <li><a href="{{ url('/helpcenter-guides') }}" class="sub-menu-item">Guides</a></li>
                                <li><a href="{{ url('/helpcenter-support') }}" class="sub-menu-item">Support</a></li>
                            </ul>  
                        </li>

                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Auth Pages </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/login') }}" class="sub-menu-item"> Login</a></li>
                                <li><a href="{{ url('/signup') }}" class="sub-menu-item"> Signup</a></li>
                                <li><a href="{{ url('/forgot-password') }}" class="sub-menu-item"> Forgot Password</a></li>
                                <li><a href="{{ url('/lock-screen') }}" class="sub-menu-item"> Lock Screen</a></li>
                            </ul> 
                        </li>

                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Utility </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/terms') }}" class="sub-menu-item">Terms of Services</a></li>
                                <li><a href="{{ url('/privacy') }}" class="sub-menu-item">Privacy Policy</a></li>
                            </ul>  
                        </li>

                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Special </a><span class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="{{ url('/comingsoon') }}" class="sub-menu-item"> Coming Soon</a></li>
                                <li><a href="{{ url('/maintenance') }}" class="sub-menu-item"> Maintenance</a></li>
                                <li><a href="{{ url('/404') }}" class="sub-menu-item"> 404!</a></li>
                            </ul> 
                        </li>
                    </ul>
                </li>

                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Blog</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ url('/blogs') }}" class="sub-menu-item"> Blogs</a></li>
                        <li><a href="{{ url('/blog-standard') }}" class="sub-menu-item"> Blog Standard</a></li>
                        <li><a href="{{ url('/blog-detail') }}" class="sub-menu-item"> Blog Detail</a></li>
                    </ul> 
                </li>

                -->

                <li><a href="{{ url('/contact') }}" class="sub-menu-item">Contact Us</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->