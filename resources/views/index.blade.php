@extends('layouts.main')

@push('styles')
<style>

    .slide-transition {
        transition: opacity 1000ms cubic-bezier(0.4, 0, 0.2, 1);
    }
    .slide-bg {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
    #marqueeContent {
        animation: scroll 20s linear infinite;
    }

    #marqueeContent:hover {
        animation-play-state: paused;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-100% - 1.5rem));
        }
    }

    #packagesMarqueeContent {
        animation: packagesScroll 25s linear infinite;
    }

    #packagesMarqueeContent:hover {
        animation-play-state: paused;
    }

    @keyframes packagesScroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(calc(-100% - 1.5rem));
        }
    }
</style>
@endpush

@section('title', 'Index Page')

@section('content')

@include('includes.navbar')

<!-- 1. Hero Section -->
<section x-data="heroSlider()" x-init="init(); startAutoplay()" x-cloak class="relative w-full min-h-[750px] pb-0 overflow-hidden mb-24">

    <template x-for="(slide, index) in slides" :key="index">
        <div :class="{
                'opacity-100 pointer-events-auto z-10': activeSlide === index,
                'opacity-0 pointer-events-none z-0': activeSlide !== index
            }"
            class="absolute inset-0 w-full h-full slide-transition">
            <div class="relative h-full w-full slide-bg flex items-center justify-center"
                :style="`background-image: url('${slide.image}')`">
                <div class="absolute inset-0 bg-slate-900/40"></div>
                <div class="container relative z-20">
                    <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                        <div class="lg:col-span-8 md:col-span-7 order-2 md:order-1 text-white">
                            <h5 class="text-3xl !font-dancing" x-text="slide.subtitle"></h5>
                            <h4 class="font-bold text-4xl lg:text-6xl leading-normal mb-6 mt-5" x-html="slide.title"></h4>
                            <p class="text-white/70 text-xl max-w-xl" x-text="slide.description"></p>
                        </div>
                        <div class="lg:col-span-4 md:col-span-5 md:text-center order-1 md:order-2">
                            {{--
                            <a :href="`https://www.youtube.com/watch?v=${slide.videoId}`" target="_blank"
                                class="lg:h-24 h-20 lg:w-24 w-20 rounded-full shadow-lg inline-flex items-center justify-center bg-white hover:bg-red-500 text-red-500 hover:text-white duration-500 ease-in-out mx-auto">
                                <i class="mdi mdi-play text-3xl"></i>
                            </a>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation buttons with improved styling -->
    <button @click="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 text-white hover:text-red-500 p-2 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-sm transition-all duration-300">
        <i class="mdi mdi-chevron-left text-4xl"></i>
    </button>
    <button @click="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 text-white hover:text-red-500 p-2 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-sm transition-all duration-300">
        <i class="mdi mdi-chevron-right text-4xl"></i>
    </button>



</section>


<!-- Floating Form - Between Hero and Next Section -->
<!-- Floating Form - Between Hero and Next Section -->
<div class="relative -mt-40 z-30"> <!-- Reduced mb-8 to mb-4 -->
    <div class="container mx-auto px-4">
     <form class="p-8 bg-white dark:bg-slate-900 rounded-xl shadow-xl  border border-gray-200 dark:border-slate-800 max-w-7xl mx-auto">
    <div class="registration-form text-slate-900 text-start">
        <div class="grid lg:grid-cols-5 md:grid-cols-2 grid-cols-1 gap-6">

            <!-- Search Input -->
            <div>
                <label class="form-label font-medium text-slate-900 dark:text-white">Search:</label>
                <div class="relative mt-2">
                    <i data-feather="search" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                    <input name="name" type="text"
                        class="w-full py-3 px-3 ps-10 h-12 bg-white dark:bg-slate-800 text-slate-500 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 rounded-md border border-gray-300 dark:border-gray-300   outline-none transition-colors"
                        placeholder="Search">
                </div>
            </div>

            <!-- Start Date -->
            <div>
                <label class="form-label font-medium text-slate-900 dark:text-white">Start Date:</label>
                <div class="relative mt-2">
                    <i data-feather="calendar" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                    <input type="date" name="start_date" value="{{ date('Y-m-d') }}"
                        class="w-full py-3 px-3 ps-10 h-12 bg-white dark:bg-slate-800 text-slate-500 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 rounded-md border border-gray-300 dark:border-gray-300   outline-none transition-colors">
                </div>
            </div>

            <!-- End Date -->
            <div>
                <label class="form-label font-medium text-slate-900 dark:text-white">End Date:</label>
                <div class="relative mt-2">
                    <i data-feather="calendar" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                    <input type="date" name="end_date" value="{{ date('Y-m-d') }}"
                         class="w-full py-3 px-3 ps-10 h-12 bg-white dark:bg-slate-800 text-slate-500 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 rounded-md border border-gray-300 dark:border-gray-300   outline-none transition-colors">
                </div>
            </div>

            <!-- No. of Persons -->
            <div>
                <label class="form-label font-medium text-slate-900 dark:text-white">No. of person:</label>
                <div class="relative mt-2">
                    <i data-feather="users" class="size-[18px] absolute top-[10px] start-3 text-slate-400"></i>
                    <select name="people_count"
                        class="w-full py-3 px-3 ps-10 h-12 bg-white dark:bg-slate-800 text-slate-500 dark:text-white placeholder:text-slate-400 dark:placeholder:text-slate-500 rounded-md border border-gray-300 dark:border-gray-300   outline-none transition-colors cursor-pointer">
                        <option disabled selected>No. of person</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>

            <!-- Submit -->
            <div class="lg:mt-[35px]">
                <input type="submit"
                    class="py-2 px-5 h-12 inline-block tracking-wide text-base bg-red-500 hover:bg-red-600 text-white rounded-md w-full cursor-pointer transition-colors duration-300"
                    value="Submit">
            </div>
        </div>
    </div>
</form>


    </div>
</div>

<!-- 3. Our Services -->
<!-- Our Services Start -->
<section class="relative -mt-25 bg-gray-50 dark:bg-slate-800 z-0">
    <div class="container pt-45 pb-16">

        <div class="text-center mb-12">
            <p class="text-red-500 text-sm uppercase tracking-widest font-semibold">Our Service</p>
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">Choose Our Tour Types & Enjoy Now</h2>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-8">
            <!-- Service 1: Adventure -->
            <a href="https://themegavias.com/wp/travivu/trip-types/adventure/" class="group block bg-white dark:bg-slate-900 shadow hover:shadow-md rounded-xl overflow-hidden transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="https://themegavias.com/wp/travivu/wp-content/uploads/2024/12/service-1.jpg" alt="Adventure" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white">Mountain Climbing</h3>
                    <p class="text-slate-500 dark:text-slate-300 mt-2">There are many variations of passages</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium bg-red-500 text-white rounded hover:bg-red-600 transition">
                            View Details <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Service 2: Windsurfing -->
            <a href="https://themegavias.com/wp/travivu/activities/water-sports/" class="group block bg-white dark:bg-slate-900 shadow hover:shadow-md rounded-xl overflow-hidden transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="https://themegavias.com/wp/travivu/wp-content/uploads/2024/12/service-2.jpg" alt="Windsurfing" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white">Beach Holiday</h3>
                    <p class="text-slate-500 dark:text-slate-300 mt-2">There are many variations of passages</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium bg-red-500 text-white rounded hover:bg-red-600 transition">
                            View Details <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Service 3: Paragliding -->
            <a href="https://themegavias.com/wp/travivu/trip-types/paragliding/" class="group block bg-white dark:bg-slate-900 shadow hover:shadow-md rounded-xl overflow-hidden transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="https://themegavias.com/wp/travivu/wp-content/uploads/2024/12/service-3.jpg" alt="Paragliding" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white">Excursion Trips</h3>
                    <p class="text-slate-500 dark:text-slate-300 mt-2">There are many variations of passages</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium bg-red-500 text-white rounded hover:bg-red-600 transition">
                            View Details <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>

            <!-- Service 4: Wildlife -->
            <a href="https://themegavias.com/wp/travivu/trip-types/wildlife-safari/" class="group block bg-white dark:bg-slate-900 shadow hover:shadow-md rounded-xl overflow-hidden transition-all duration-300">
                <div class="overflow-hidden">
                    <img src="https://themegavias.com/wp/travivu/wp-content/uploads/2024/12/service-4.jpg" alt="Wildlife" class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-xl font-semibold text-slate-900 dark:text-white">Holiday Safaris</h3>
                    <p class="text-slate-500 dark:text-slate-300 mt-2">There are many variations of passages</p>
                    <div class="mt-4">
                        <span class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium bg-red-500 text-white rounded hover:bg-red-600 transition">
                            View Details <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </a>
        </div><!-- end grid -->
    </div><!-- end container -->
</section>

<!-- Our Services End -->

<!-- 4. Tour Packages -->
 <div class="container relative md:mt-24 mt-16">             
    <div class="grid grid-cols-1 pb-8">             
        <div class="flex items-center justify-between">
            <div class="text-center w-full">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Tour Packages</h3>              
                <p class="text-slate-400 max-w-xl mx-auto">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
            </div>
            
            <div class="hidden md:flex items-center gap-x-3 flex-shrink-0">                                  
                <!-- Left Arrow -->                                  
                <button onclick="scrollPackagesLeft()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">                                          
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">                                                  
                        <polyline points="15 18 9 12 15 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />                                          
                    </svg>                                  
                </button>                                  
                <!-- Right Arrow -->                                  
                <button onclick="scrollPackagesRight()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">                                          
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">                                                  
                        <polyline points="9 18 15 12 9 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />                                          
                    </svg>                                  
                </button>                          
            </div>
        </div>                  
    </div>
    
    <!-- Marquee Container -->     
    <div class="overflow-hidden mt-6" id="packagesMarqueeContainer">         
        <div class="flex gap-6" id="packagesMarqueeContent">                        
            @include('includes.Hero.tours-packages')
        </div>     
    </div>
    
  
</div>
<!-- 5. About Us -->
<div class="container relative md:mt-24 mt-16 pb-5">
    @include('includes.Hero.about')
</div>

<!-- 6. Top Destinations -->
<section class="relative bg-gray-50 md:py-24 py-16 overflow-hidden">
   <div class="container relative">             
    <div class="grid grid-cols-1 pb-8">             
        <div class="flex items-center justify-between">
            <div class="text-center w-full">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Top Destinations</h3>              
                <p class="text-slate-400 max-w-xl mx-auto">Planning for a trip? We will organize your trip with the best places and within best budget!</p>
            </div>
            
            <div class="hidden md:flex items-center gap-x-3 flex-shrink-0">                                  
                <!-- Left Arrow -->                                  
                <button onclick="scrollLeft()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">                                          
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">                                                  
                        <polyline points="15 18 9 12 15 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />                                          
                    </svg>                                  
                </button>                                  
                <!-- Right Arrow -->                                  
                <button onclick="scrollRight()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">                                          
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">                                                  
                        <polyline points="9 18 15 12 9 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />                                          
                    </svg>                                  
                </button>                          
            </div>
        </div>                  
    </div>
    
    <!-- Marquee Container -->     
    <div class="overflow-hidden mt-6" id="marqueeContainer">         
        <div class="flex gap-6" id="marqueeContent">                        
            @include('includes.Hero.top-destinations')          
        </div>     
    </div> 
</div>
</section>

<!-- 7. Reviews -->
<section class="relative md:py-24 py-16 overflow-hidden">
<div class="container relative">
    <div class="grid grid-cols-1 pb-5 text-center">
        <h3 class="mb-6 md:text-3xl text-2xl font-semibold">What Our Users Say</h3>
        <p class="text-slate-400 max-w-xl mx-auto">This is just a simple text made for this unique and awesome template, you can replace it with any text.</p>
    </div>
    <div class="grid grid-cols-1 mt-6">
        <div class="tiny-three-item">
            @include('includes.Hero.reviews')
        </div>
    </div>
</div>

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




@push('scripts')
<script>
function heroSlider() {
    return {
        activeSlide: 0,
        autoplayTimer: null,
        isTransitioning: false,
        slides: [
            {
                image: '{{ asset('assets/images/slide/Bisech003.webp') }}',
                subtitle: '',
                title: ``,
                description: '',
                videoId: 'S_CGed6E610'
            },
            {
                image: '{{ asset('assets/images/slide/bisech005.jpg') }}',
                subtitle: '',
                title: `Adventure Begins`,
                description: '',
                videoId: 'S_CGed6E610'
            },
            {
                image: '{{ asset('assets/images/slide/Bisech010.jpg') }}',
                subtitle: '',
                title: ``,
                description: '',
                videoId: 'S_CGed6E610'
            },
             {
                image: '{{ asset('assets/images/slide/bisech002.jpg') }}',
                subtitle: '',
                title: 'Book your Flight',
                description: '',
                videoId: 'S_CGed6E610'
            },
             {
                image: '{{ asset('assets/images/slide/13.jpg') }}',
                subtitle: '',
                title: `Explore Hidden Places,<br> Make Memories`,
                description: '',
                videoId: 'S_CGed6E610'
            },
            {
                image: '{{ asset('assets/images/slide/Bisech012.webp') }}',
                subtitle: '',
                title: `Car Rental Services`,
                description: '',
                videoId: 'S_CGed6E610'
            },
             {
                image: '{{ asset('assets/images/slide/Bisech014.jpg') }}',
                subtitle: '',
                title: ``,
                description: '',
                videoId: 'S_CGed6E610'
            },
             {
                image: '{{ asset('assets/images/slide/Bisech011.jpg') }}',
                subtitle: '',
                title: ``,
                description: '',
                videoId: 'S_CGed6E610'
            }
        ],
        
        init() {
            // Preload images to prevent flicker
            this.preloadImages();
        },
        
        preloadImages() {
            this.slides.forEach(slide => {
                const img = new Image();
                img.src = slide.image;
            });
        },
        
        startAutoplay() {
            this.stopAutoplay(); // Ensure no multiple intervals
            this.autoplayTimer = setInterval(() => {
                this.nextSlide();
            }, 5000); // Changed to 5s for better UX
        },
        
        stopAutoplay() {
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            }
        },
        
        nextSlide() {
            if (this.isTransitioning) return;
            this.isTransitioning = true;
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            
            // Reset transition flag after animation completes
            setTimeout(() => {
                this.isTransitioning = false;
            }, 1000);
        },
        
        prevSlide() {
            if (this.isTransitioning) return;
            this.isTransitioning = true;
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
            
            setTimeout(() => {
                this.isTransitioning = false;
            }, 1000);
        },
        
        goToSlide(index) {
            if (this.isTransitioning || this.activeSlide === index) return;
            this.isTransitioning = true;
            this.activeSlide = index;
            
            setTimeout(() => {
                this.isTransitioning = false;
            }, 1000);
        }
    }
}
</script>

  <script>
        let currentTranslate = 0;
        const cardWidth = 320 + 24; // card width + gap
        const totalCards = 7;
        const maxTranslate = -(cardWidth * (totalCards - 3)); // Show 3 cards at a time
        
        function scrollLeft() {
            const marqueeContent = document.getElementById('marqueeContent');
            currentTranslate = Math.min(currentTranslate + cardWidth, 0);
            marqueeContent.style.transform = `translateX(${currentTranslate}px)`;
            marqueeContent.style.animation = 'none';
        }
        
        function scrollRight() {
            const marqueeContent = document.getElementById('marqueeContent');
            currentTranslate = Math.max(currentTranslate - cardWidth, maxTranslate);
            marqueeContent.style.transform = `translateX(${currentTranslate}px)`;
            marqueeContent.style.animation = 'none';
        }
        
        // Reset auto-scroll when user stops interacting
        let resetTimeout;
        function resetAutoScroll() {
            clearTimeout(resetTimeout);
            resetTimeout = setTimeout(() => {
                const marqueeContent = document.getElementById('marqueeContent');
                marqueeContent.style.animation = 'scroll 20s linear infinite';
                currentTranslate = 0;
                marqueeContent.style.transform = 'translateX(0)';
            }, 5000);
        }
        
        // Add event listeners
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button[onclick]').forEach(button => {
                button.addEventListener('click', resetAutoScroll);
            });
        });
    </script>

      <script>
        let packagesCurrentTranslate = 0;
        const packagesCardWidth = 320 + 24; // card width + gap
        const packagesTotalCards = 6;
        const packagesMaxTranslate = -(packagesCardWidth * (packagesTotalCards - 3)); // Show 3 cards at a time
        
        function scrollPackagesLeft() {
            const marqueeContent = document.getElementById('packagesMarqueeContent');
            packagesCurrentTranslate = Math.min(packagesCurrentTranslate + packagesCardWidth, 0);
            marqueeContent.style.transform = `translateX(${packagesCurrentTranslate}px)`;
            marqueeContent.style.animation = 'none';
        }
        
        function scrollPackagesRight() {
            const marqueeContent = document.getElementById('packagesMarqueeContent');
            packagesCurrentTranslate = Math.max(packagesCurrentTranslate - packagesCardWidth, packagesMaxTranslate);
            marqueeContent.style.transform = `translateX(${packagesCurrentTranslate}px)`;
            marqueeContent.style.animation = 'none';
        }
        
        // Reset auto-scroll when user stops interacting
        let packagesResetTimeout;
        function resetPackagesAutoScroll() {
            clearTimeout(packagesResetTimeout);
            packagesResetTimeout = setTimeout(() => {
                const marqueeContent = document.getElementById('packagesMarqueeContent');
                marqueeContent.style.animation = 'packagesScroll 25s linear infinite';
                packagesCurrentTranslate = 0;
                marqueeContent.style.transform = 'translateX(0)';
            }, 5000);
        }
        
        // Add event listeners for packages
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button[onclick^="scrollPackages"]').forEach(button => {
                button.addEventListener('click', resetPackagesAutoScroll);
            });
        });
    </script>
 
@endpush