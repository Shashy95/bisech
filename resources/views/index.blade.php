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

@section('title', config('site.title'))

@section('content')

@include('includes.navbar')

<!-- 1. Hero Section -->
<section x-data="heroSlider()" x-init="init(); startAutoplay()" x-cloak class="relative w-full min-h-[520px] md:min-h-[680px] overflow-hidden">

    <template x-for="(slide, index) in slides" :key="index">
        <div :class="{
                'opacity-100 pointer-events-auto z-10': activeSlide === index,
                'opacity-0 pointer-events-none z-0': activeSlide !== index
            }"
            class="absolute inset-0 w-full h-full transition-opacity duration-1000 ease-in-out">
            <div class="relative h-full w-full flex items-center justify-center bg-cover bg-center"
                :style="`background-image: url('${slide.image}')`">
                <div class="absolute inset-0 bg-slate-900/40"></div>
            </div>
        </div>
    </template>

    <div class="absolute inset-0 z-20 flex items-center justify-center text-center px-4">
        <div class="max-w-3xl">
            <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight">Safaris, Car Hire &amp; Flights in Tanzania</h1>
            <p class="mt-4 text-base md:text-lg text-white/90">Tell us your dates and budget. We plan the trip and send you a clear quote.</p>
            <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ \App\Support\Site::wa('Hello ' . config('site.name') . ', I would like a quote for a trip.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif
                   class="py-3 px-6 rounded-md bg-red-500 hover:bg-red-600 text-white font-semibold">{{ \App\Support\Site::hasWhatsapp() ? 'Get a Quote on WhatsApp' : 'Get a Quote' }}</a>
                <a href="#packages" class="py-3 px-6 rounded-md bg-white/90 hover:bg-white text-slate-900 font-semibold">See Tour Packages</a>
            </div>
        </div>
    </div>

    <button @click="prevSlide()" x-show="slides.length > 1" class="absolute left-4 top-1/2 -translate-y-1/2 z-30 text-white hover:text-red-500 p-2 rounded-full bg-black/20 hover:bg-black/40 transition">
        <i class="mdi mdi-chevron-left text-4xl"></i>
    </button>
    <button @click="nextSlide()" x-show="slides.length > 1" class="absolute right-4 top-1/2 -translate-y-1/2 z-30 text-white hover:text-red-500 p-2 rounded-full bg-black/20 hover:bg-black/40 transition">
        <i class="mdi mdi-chevron-right text-4xl"></i>
    </button>
</section>

<!-- 3. Our Services -->
<section class="relative md:mt-16 mt-8 bg-white">
    <div class="container mx-auto pt-12 pb-16 px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white">
                What We Can Arrange for You
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = [
                    ['title' => 'Car Hire',            'desc' => 'From budget cars to luxury SUVs and 4x4s for off-road, perfect for any travel purpose.', 'image' => '1.jpg'],
                    ['title' => 'Tourism Management',  'desc' => 'From itinerary design to bookings & experiences, we offer end-to-end tourism solutions.',  'image' => '2.jpg'],
                    ['title' => 'Air Ticketing',       'desc' => 'Book, cancel, or reschedule domestic & international flights at competitive rates.',      'image' => '3.jpg'],
                    ['title' => 'Mountain Climbing',   'desc' => 'Join our guided adventures to breathtaking peaks — safe, fun, and unforgettable.',        'image' => '4.jpg'],
                    ['title' => 'Beach Holiday',       'desc' => 'Serene beaches, luxury stays, water sports — we tailor the perfect coastal experience.',   'image' => '5.jpg'],
                    ['title' => 'Custom Packages',     'desc' => 'Tell us your dream — we’ll design the experience: solo, family, or corporate group.',      'image' => '6.jpg'],
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
</section>

<!-- 4. Tour Packages -->
@php
    $defaultTours = [
        ['id' => 1, 'title' => 'Serengeti Safari',     'slug' => 'serengeti-safari',  'description' => 'Experience wildlife like never before in Serengeti.', 'image' => 'assets/images/listing/1.jpg',  'price' => '$450',   'days' => '3 Days', 'tag' => 'Wildlife'],
        ['id' => 2, 'title' => 'Zanzibar Beach Escape','slug' => 'zanzibar-beach',    'description' => 'Relax at the turquoise beaches of Zanzibar.',         'image' => 'assets/images/listing/2.jpg',  'price' => '$320',   'days' => '4 Days', 'tag' => 'Beach'],
        ['id' => 3, 'title' => 'Mount Kilimanjaro Trek','slug' => 'kilimanjaro',      'description' => 'Climb Africa’s highest peak with expert guides.',     'image' => 'assets/images/listing/3.jpg',  'price' => '$1,200', 'days' => '7 Days', 'tag' => 'Adventure'],
        ['id' => 4, 'title' => 'Ngorongoro Crater Tour','slug' => 'ngorongoro',      'description' => 'Explore the world’s largest volcanic caldera.',       'image' => 'assets/images/listing/4.jpg',  'price' => '$380',   'days' => '2 Days', 'tag' => 'Safari'],
        ['id' => 5, 'title' => 'Lake Manyara Day Trip', 'slug' => 'lake-manyara',     'description' => 'See tree-climbing lions and pink flamingos.',         'image' => 'assets/images/listing/5.jpg',  'price' => '$180',   'days' => '1 Day',  'tag' => 'Day Trip'],
        ['id' => 6, 'title' => 'Tarangire Safari',      'slug' => 'tarangire-safari', 'description' => 'Giant baobabs and the largest elephant herds.',       'image' => 'assets/images/listing/6.jpg',  'price' => '$260',   'days' => '2 Days', 'tag' => 'Safari'],
    ];

    if (isset($tourPackages) && count($tourPackages) > 0) {
        $tourList = collect($tourPackages)->map(function ($t) {
            return [
                'id'          => $t->id,
                'title'       => $t->title,
                'slug'        => $t->slug,
                'description' => $t->description,
                'image'       => 'storage/' . $t->image,
                'price'       => $t->price    ?? null,
                'days'        => $t->days     ?? null,
                'tag'         => $t->category ?? 'Tour',
            ];
        })->values()->all();
    } else {
        $tourList = $defaultTours;
    }
@endphp

<div id="packages" class="container relative md:mt-24 mt-16" x-data="tourSlider()" x-init="startAutoSlide()">
    <div class="grid grid-cols-1 pb-8">
        <div class="flex items-center justify-between">
            <div class="text-center w-full">
                <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Tour Packages</h3>
                <p class="text-slate-400 max-w-xl mx-auto">
                    Sample trips to start from. Prices are per person; tell us your dates and group size for a firm quote.
                </p>
            </div>

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
                        <a :href="quoteHref(tour)" :target="isWa ? '_blank' : '_self'" rel="noopener"
                           class="block bg-white rounded-2xl shadow-md hover:shadow-2xl transition-all duration-300 overflow-hidden group">

                            <div class="relative">
                                <img :src="'/' + tour.image"
                                     class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500"
                                     :alt="tour.title">
                                <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full"
                                      x-text="tour.tag"></span>
                                <span x-show="tour.days"
                                      class="absolute top-3 right-3 bg-black/70 text-white text-xs font-medium px-3 py-1 rounded-full"
                                      x-text="tour.days"></span>
                            </div>

                            <div class="p-5">
                                <h4 class="text-lg font-bold text-slate-900 mb-2" x-text="tour.title"></h4>
                                <p class="text-sm text-gray-600 mb-4" x-text="tour.description.length > 80 ? tour.description.substring(0, 80).trim() + '…' : tour.description"></p>

                                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                    <div class="text-sm text-slate-500" x-show="tour.price">From</div>
                                    <div class="flex items-center gap-2">
                                        <span class="text-red-600 font-bold text-lg" x-show="tour.price" x-text="tour.price"></span>
                                        <span class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-1.5 rounded-full transition">
                                            Get a Quote
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </template>
                </div>
            </template>
        </div>
    </div>

    <!-- Dots -->
    <div class="flex justify-center mt-6 gap-2">
        <template x-for="(page, index) in pages" :key="index">
            <button @click="goTo(index)"
                    class="w-3 h-3 rounded-full transition"
                    :class="active === index ? 'bg-red-500 w-6' : 'bg-gray-300'"></button>
        </template>
    </div>
</div>

<!-- 5. About Us -->
<div class="container relative md:mt-24 mt-16 pb-5">
    @include('includes.Hero.about')
</div>

<!-- 6. Top Destinations -->
@php
    $defaultDestinations = [
        (object) [
            'title'       => 'Mount Kilimanjaro',
            'slug'        => 'mount-kilimanjaro',
            'description' => 'The Roof of Africa: a guided trek to the top of Tanzania.',
            'image'       => 'assets/images/bg/1.jpg',
            'is_default'  => true,
        ],
        (object) [
            'title'       => 'Mount Meru Trek',
            'slug'        => 'mount-meru-trek',
            'description' => 'A shorter climb with big views of Kilimanjaro. Good as a first trek.',
            'image'       => 'assets/images/bg/2.jpg',
            'is_default'  => true,
        ],
        (object) [
            'title'       => 'Zanzibar Beaches',
            'slug'        => 'zanzibar-beaches',
            'description' => 'White sand, clear water and Swahili culture, with stays arranged.',
            'image'       => 'assets/images/bg/3.jpg',
            'is_default'  => true,
        ],
        (object) [
            'title'       => 'Nungwi Beach',
            'slug'        => 'nungwi-beach',
            'description' => 'Zanzibar\'s liveliest beach for sunsets, dhow cruises and snorkelling.',
            'image'       => 'assets/images/bg/4.jpg',
            'is_default'  => true,
        ],
    ];

    $destinationList = (isset($destinations) && count($destinations) > 0)
        ? $destinations
        : $defaultDestinations;
@endphp

<section class="relative bg-gray-50 md:py-24 py-16 overflow-hidden">
    <div class="container relative">
        <div class="grid grid-cols-1 pb-8">
            <div class="flex items-center justify-between">
                <div class="text-center w-full">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">
                        Top Destinations
                    </h3>
                    <p class="text-slate-400 max-w-xl mx-auto">
                        Trek the highest peaks or unwind on the finest beaches — pick your adventure.
                    </p>
                </div>

                <div class="hidden md:flex items-center gap-x-3 flex-shrink-0">
                    <button onclick="scrollLeft()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">
                            <polyline points="15 18 9 12 15 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button onclick="scrollRight()" class="h-10 w-10 flex items-center justify-center rounded-full border border-gray-400 bg-white hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="#828282">
                            <polyline points="9 18 15 12 9 6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Grid on desktop (all 4 visible), horizontal scroll on mobile --}}
        <div class="mt-6">
            <div class="flex gap-6 overflow-x-auto scroll-smooth pb-2 lg:grid lg:grid-cols-4 lg:overflow-visible"
                 id="marqueeContent">
                @foreach ($destinationList as $destination)
                    @php
                        $isDefault = !empty($destination->is_default);
                        $imgSrc    = $isDefault ? asset($destination->image) : asset('storage/' . $destination->image);
                        $detailUrl = $isDefault ? \App\Support\Site::wa('Hello ' . config('site.name') . ', I would like details about: ' . $destination->title) : route('destination-detail', $destination->slug);

                        $title = strtolower($destination->title);
                        if (str_contains($title, 'beach') || str_contains($title, 'zanzibar') || str_contains($title, 'nungwi')) {
                            $badge = 'Beach';
                            $badgeColor = 'bg-cyan-500';
                        } else {
                            $badge = 'Trekking';
                            $badgeColor = 'bg-emerald-600';
                        }
                    @endphp

                    <div class="min-w-[300px] lg:min-w-0 w-full bg-white rounded-lg overflow-hidden shadow-md border border-red-500 flex-shrink-0 lg:flex-shrink">
                        <div class="relative">
                            <img src="{{ $imgSrc }}" alt="{{ $destination->title }}" class="w-full h-48 object-cover">
                            <span class="absolute top-3 left-3 {{ $badgeColor }} text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $badge }}
                            </span>
                        </div>
                        <div class="p-4">
                            <h4 class="text-lg font-semibold text-red-600">{{ $destination->title }}</h4>
                            <p class="text-sm text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit($destination->description, 80) }}</p>
                            <a href="{{ $detailUrl }}" @if ($isDefault && \App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif class="p-2 px-4 relative top-1.5 bg-black rounded-3xl text-white inline-block">{{ $isDefault ? 'Ask About This Trip' : 'View Details' }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- 7. How booking works -->
<section class="relative md:py-24 py-16 overflow-hidden">
<div class="container relative">
    <div class="grid grid-cols-1 pb-5 text-center">
        <h3 class="mb-6 md:text-3xl text-2xl font-semibold">How Booking Works</h3>
        <p class="text-slate-400 max-w-xl mx-auto">Three simple steps from first message to departure.</p>
    </div>
    <div class="grid md:grid-cols-3 grid-cols-1 gap-8 mt-6">
        @foreach ([
            ['1', 'Tell us where and when', 'Send your dates, group size and budget on WhatsApp or the contact form.'],
            ['2', 'Get a clear quote', 'You see the full price and what is included before you pay anything.'],
            ['3', 'Travel with support', 'We arrange the vehicle, flights and stays, and stay reachable throughout your trip.'],
        ] as [$n, $title, $text])
            <div class="text-center px-6">
                <div class="size-14 mx-auto rounded-full bg-red-500 text-white text-xl font-bold flex items-center justify-center">{{ $n }}</div>
                <h5 class="mt-5 text-lg font-semibold">{{ $title }}</h5>
                <p class="text-slate-400 mt-3">{{ $text }}</p>
            </div>
        @endforeach
    </div>
</div>
</section>

@endsection


<script>
    function heroSlider() {
        return {
            activeSlide: 0,
            autoplayTimer: null,
            slides: [
                {
                    image: "{{ asset('assets/images/bisech002.jpg') }}",
                },
            ],
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
                clearInterval(this.autoplayTimer);
                this.autoplayTimer = null;
            },
            nextSlide() {
                if (this.slides.length === 0) return;
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            },
            prevSlide() {
                if (this.slides.length === 0) return;
                this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length;
            }
        };
    }
</script>

@push('scripts')
<script>
    function tourSlider() {
        return {
            active: 0,
            pages: [],
            tours: @json($tourList),
            waBase: @json(\App\Support\Site::waBase()),
            isWa: @json(\App\Support\Site::hasWhatsapp()),
            quoteHref(tour) {
                const msg = this.isWa
                    ? 'Hello {{ config('site.name') }}, I would like a quote for: ' + tour.title
                    : tour.title;
                return this.waBase + encodeURIComponent(msg);
            },

            chunkArray(array, size) {
                const chunks = [];
                for (let i = 0; i < array.length; i += size) {
                    chunks.push(array.slice(i, i + size));
                }
                return chunks;
            },

            startAutoSlide() {
                this.pages = this.chunkArray(this.tours, 3);
                if (this.pages.length === 0) return;
                setInterval(() => {
                    this.next();
                }, 6000);
            },

            next() {
                if (this.pages.length === 0) return;
                this.active = (this.active + 1) % this.pages.length;
            },

            prev() {
                if (this.pages.length === 0) return;
                this.active = (this.active - 1 + this.pages.length) % this.pages.length;
            },

            goTo(index) {
                if (index >= 0 && index < this.pages.length) {
                    this.active = index;
                }
            }
        };
    }
</script>
@endpush

{{-- Destinations horizontal scroll — ONLY on mobile/tablet. On desktop the grid handles layout --}}
<script>
    function scrollLeft() {
        const container = document.getElementById('marqueeContent');
        if (container) container.scrollLeft -= 320;
    }

    function scrollRight() {
        const container = document.getElementById('marqueeContent');
        if (container) container.scrollLeft += 320;
    }
</script>