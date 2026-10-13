@extends('layouts.brand-page')

@section('title', $tour->title.' | Trip idea | '.config('site.name'))

@section('description', \Illuminate\Support\Str::limit(
    strip_tags($tour->description ?: $tour->paragraph ?: 'Discuss this Tanzania trip idea with Bisech.'),
    155
))

@section('content')

@php
    $image = $tour->image
        ? (
            \Illuminate\Support\Str::startsWith($tour->image, 'assets/')
                ? asset($tour->image)
                : asset('storage/' . $tour->image)
        )
        : asset('assets/images/slide/Bisech003.webp');

    $whatsappMessage = 'Hello Bisech, I would like to enquire about the '
        . $tour->title
        . ' package. Please share the itinerary, price, availability and what is included. My travel dates are:';

    $whatsappUrl = \App\Support\Site::wa($whatsappMessage);
@endphp

{{-- Hero --}}
<section class="bp-hero" style="background-image: url('{{ $image }}')">
    <div class="bp-shell bp-hero-in">
        <p class="bp-kicker">Trip idea · Tanzania</p>

        <h1>{{ $tour->title }}</h1>

        <p>
            {{ $tour->description ?: 'A starting point for planning a Tanzania journey around your interests, travel dates and group.' }}
        </p>
    </div>
</section>

{{-- Package details --}}
<section class="bp-section">
    <div class="bp-shell bp-two">

        <div>
            <p class="bp-kicker">Explore this trip</p>

            <h2 class="bp-title">Make the journey your own.</h2>

            <div class="bp-copy">
                {!! nl2br(e(
                    $tour->paragraph
                    ?: $tour->description
                    ?: 'Tell us what interests you about this trip, when you hope to travel and who will be joining. We can discuss route options and the arrangements to consider.'
                )) !!}
            </div>

            <div class="bp-meta">
                <span class="bp-pill">Flexible planning</span>
                <span class="bp-pill">Dates by enquiry</span>
                <span class="bp-pill">Quote on request</span>
            </div>

            <p class="bp-copy">
                Trip duration, itinerary, inclusions, availability and pricing
                are confirmed individually. No fixed price or availability is
                assumed on this page.
            </p>

            {{-- WhatsApp enquiry button --}}
            @if(\App\Support\Site::hasWhatsapp())
                <a
                    class="bp-btn alt"
                    href="{{ $whatsappUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label="Enquire about {{ $tour->title }} on WhatsApp"
                >
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    Enquire on WhatsApp
                    <span aria-hidden="true">↗</span>
                </a>
            @else
                <a
                    class="bp-btn alt"
                    href="{{ route('contact') }}?ref={{ urlencode($tour->title) }}"
                >
                    Enquire about this trip
                    <span aria-hidden="true">↗</span>
                </a>
            @endif

        </div>

        <div>
            <img
                class="bp-photo"
                src="{{ $image }}"
                alt="{{ $tour->title }}"
                loading="lazy"
                onerror="this.onerror=null; this.src='{{ asset('assets/images/slide/Bisech003.webp') }}';"
            >
        </div>

    </div>
</section>

{{-- Enquiry call to action --}}
<section class="bp-section" style="background: var(--sand)">
    <div class="bp-shell bp-cta">

        <div>
            <p class="bp-kicker">Not sure where to start?</p>

            <h2>We can help you compare your options.</h2>

            <p class="bp-copy">
                Share your travel dates, group size, budget range and the
                experiences you care about most. We can discuss the options
                that best fit your plans.
            </p>
        </div>

        <div>
            @if(\App\Support\Site::hasWhatsapp())
                <a
                    class="bp-btn"
                    href="{{ $whatsappUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    Chat with Bisech
                    <span aria-hidden="true">↗</span>
                </a>
            @else
                <a
                    class="bp-btn"
                    href="{{ route('contact') }}?ref={{ urlencode($tour->title) }}"
                >
                    Send an enquiry
                    <span aria-hidden="true">↗</span>
                </a>
            @endif
        </div>

    </div>
</section>

@endsection

