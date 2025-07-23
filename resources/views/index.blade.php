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
<!-- 1. Hero Section -->
<section x-data="heroSlider()" x-init="init(); startAutoplay()" x-cloak class="relative w-full min-h-[750px] pb-0 overflow-hidden mb-24">

    <template x-for="(slide, index) in slides" :key="index">
        <div :class="{
                'opacity-100 pointer-events-auto z-10': activeSlide === index,
                'opacity-0 pointer-events-none z-0': activeSlide !== index
            }"
            class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out">
            <div class="relative h-full w-full flex items-center justify-center bg-cover bg-center"
                :style="`background-image: url('${slide.image}')`">
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-slate-900/40"></div>

                <!-- Slide content -->
                <div class="container relative z-20 text-white text-center px-4">
                    <p x-text="slide.subtitle" class="text-xl md:text-2xl font-light mb-2" x-show="slide.subtitle"></p>
                    <h1 x-html="slide.title" class="text-4xl md:text-6xl font-bold leading-tight mb-4"></h1>
                    <p x-text="slide.description" class="text-lg md:text-xl max-w-3xl mx-auto" x-show="slide.description"></p>
                </div>
            </div>
        </div>
    </template>

    <!-- Navigation buttons -->
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
<!-- Our Services Start -->
<div class="container relative md:mt-24 mt-16  bg-white">
    <div class="container mx-auto pt-20 pb-16 px-4">
        <div class="text-center mb-12">
            
            <h2 class="text-3xl md:text-4xl py-72 font-bold text-slate-900 dark:text-white">
                Choose Our Tour Types & Enjoy Now
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = [
                    [
                        'title' => 'Car Hire',
                        'desc' => 'From budget cars to luxury SUVs and 4x4s for off-road, perfect for any travel purpose.',
                        'image' => '1.jpg',
                    ],
                    [
                        'title' => 'Tourism Management',
                        'desc' => 'From itinerary design to bookings & experiences, we offer end-to-end tourism solutions.',
                        'image' => '2.jpg',
                    ],
                    [
                        'title' => 'Air Ticketing',
                        'desc' => 'Book, cancel, or reschedule domestic & international flights at competitive rates.',
                        'image' => '3.jpg',
                    ],
                    [
                        'title' => 'Mountain Climbing',
                        'desc' => 'Join our guided adventures to breathtaking peaks — safe, fun, and unforgettable.',
                        'image' => '4.jpg',
                    ],
                    [
                        'title' => 'Beach Holiday',
                        'desc' => 'Serene beaches, luxury stays, water sports — we tailor the perfect coastal experience.',
                        'image' => '5.jpg',
                    ],
                    [
                        'title' => 'Custom Packages',
                        'desc' => 'Tell us your dream — we’ll design the experience: solo, family, or corporate group.',
                        'image' => '6.jpg',
                    ],
                ];
            @endphp

            @foreach ($services as $service)
                <div class="bg-white border border-red-500 rounded-lg shadow hover:shadow-lg transition p-6 text-center">
                    <img src="{{ asset('assets/images/blog/' . $service['image']) }}"
                         alt="{{ $service['title'] }}"
                         class="w-20 h-20 rounded-full mx-auto object-cover mb-4 border-4 border-white shadow-md">
                    <h3 class="text-xl font-semibold text-red-500 dark:text-white mb-2">
                        {{ $service['title'] }}
                    </h3>
                    <p class="text-black text-sm">
                        {{ $service['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
            </div>



<!-- Our Services End -->

<!-- 4. Tour Packages -->
<div class="container relative md:mt-24 mt-16" x-data="tourSlider()" x-init="startAutoSlide()">
    <div class="grid grid-cols-1 pb-8">
        <div class="flex items-center justify-between">
            <div class="text-center w-full">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Tour Packages</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Planning for a trip? We will organize your trip with the best places and within best budget!
                </p>
            </div>

            <!-- Arrows -->
            <div class="hidden md:flex items-center gap-x-3 flex-shrink-0 z-10 relative">
                <button @click="prev()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">
                        <polyline points="15 18 9 12 15 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <button @click="next()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">
                        <polyline points="9 18 15 12 9 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Slider -->
   <div class="relative overflow-hidden mt-6">
    <div class="flex transition-all duration-700 ease-in-out"
         :style="`transform: translateX(-${active * 100}%); width: ${pages.length * 100}%`">
        <template x-for="(page, pageIndex) in pages" :key="pageIndex">
            <div class="w-full flex-shrink-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
                <template x-for="tour in page" :key="tour.id">
                    <a :href="`/tour-detail-two/${tour.slug}`" class="block bg-white rounded shadow-lg overflow-hidden hover:shadow-xl transition">
                        <img :src="'/storage/' + tour.image" class="w-full h-48 object-cover" :alt="tour.title">
                        <div class="p-4">
                            <h4 class="text-lg font-bold mb-2" x-text="tour.title"></h4>
                            <p class="text-sm text-gray-600" x-text="tour.description.substring(0, 80) + '...'"></p>
                        </div>
                    </a>
                </template>
            </div>
        </template>
    </div>
</div>


    <!-- Dots -->
    <div class="flex justify-center mt-4 gap-2">
        <template x-for="(page, index) in pages" :key="index">
            <button @click="goTo(index)"
                    class="w-3 h-3 rounded-full"
                    :class="active === index ? 'bg-red-500' : 'bg-gray-300'"></button>
        </template>
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
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">
                        Top Destinations
                    </h3>
                    <p class="text-slate-400 max-w-xl mx-auto">
                        Planning for a trip? We will organize your trip with the best places and within best budget!
                    </p>
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

        <!-- Marquee Scroll Container -->
        <div class="overflow-hidden mt-6" id="marqueeContainer">
            <div class="flex gap-6 transition-all duration-300 ease-in-out overflow-x-auto scroll-smooth" id="marqueeContent">
                @foreach ($destinations as $destination)
                    <div class="min-w-[300px] max-w-sm bg-white rounded-lg overflow-hidden shadow-md border border-red-500 flex-shrink-0">
                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-red-600">{{ $destination->title }}</h4>
                            <p class="text-sm text-gray-600">{{ \Illuminate\Support\Str::limit($destination->description, 80) }}</p>
                            <a href="{{ route('destination.show', $destination->slug) }}" class="text-blue-500 mt-2 inline-block hover:underline">View Details</a>
                        </div>
                    </div>
                @endforeach
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
        slides: @json($slides), // Laravel injects slides as JSON

        init() {
            this.preloadImages();
        },

        preloadImages() {
            this.slides.forEach(slide => {
                const img = new Image();
                img.src = slide.image;
            });
        },

        startAutoplay() {
            this.stopAutoplay();
            this.autoplayTimer = setInterval(() => {
                this.nextSlide();
            }, 5000);
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
            setTimeout(() => this.isTransitioning = false, 1000);
        },

        prevSlide() {
            if (this.isTransitioning) return;
            this.isTransitioning = true;
            this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
            setTimeout(() => this.isTransitioning = false, 1000);
        },

        goToSlide(index) {
            if (this.isTransitioning || this.activeSlide === index) return;
            this.isTransitioning = true;
            this.activeSlide = index;
            setTimeout(() => this.isTransitioning = false, 1000);
        }
    }
}
</script>

@endpush



@push('scripts')
<script>
function tourSlider() {
    return {
        active: 0,
        tours: @json($tours),
        pages: [],
        timer: null,

        chunkArray(array, size) {
            const chunks = [];
            for (let i = 0; i < array.length; i += size) {
                chunks.push(array.slice(i, i + size));
            }
            return chunks;
        },

        startAutoSlide() {
            this.pages = this.chunkArray(this.tours, 3); // Show 3 tours per slide
            this.timer = setInterval(() => {
                this.next();
            }, 5000);
        },

        next() {
            this.active = (this.active + 1) % this.pages.length;
        },

        prev() {
            this.active = (this.active - 1 + this.pages.length) % this.pages.length;
        },

        goTo(index) {
            this.active = index;
        }
    };
}
</script>
@endpush



<script>
    function scrollLeft() {
        const container = document.getElementById('marqueeContent');
        container.scrollLeft -= 300;
    }

    function scrollRight() {
        const container = document.getElementById('marqueeContent');
        container.scrollLeft += 300;
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
 