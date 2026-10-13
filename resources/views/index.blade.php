@extends('layouts.main')

@section('title', config('site.title'))

@push('styles')
<style>
    :root { --bisech-forest:#173b32; --bisech-deep:#102b25; --bisech-clay:#c66a45; --bisech-sand:#f6f2e9; --bisech-ink:#202b27; }
    body { background:#fff; color:var(--bisech-ink); }
    .bisech-home { overflow:hidden; font-family:inherit; }
    .bisech-home * { box-sizing:border-box; }
    .bisech-shell { width:min(1180px, calc(100% - 44px)); margin-inline:auto; }
    .bisech-nav { position:relative; z-index:30; background:#fff; border-bottom:1px solid #e9e7df; }
    .bisech-nav-inner { min-height:86px; display:flex; align-items:center; justify-content:space-between; gap:24px; }
    .bisech-brand { display:flex; align-items:center; gap:12px; color:var(--bisech-forest); text-decoration:none; }
    .bisech-brand img { width:52px; height:52px; object-fit:contain; border-radius:50%; }
    .bisech-brand-name { font-size:21px; font-weight:800; letter-spacing:.08em; line-height:1; }
    .bisech-brand-sub { display:block; margin-top:6px; color:#6d7971; font-size:10px; font-weight:700; letter-spacing:.18em; text-transform:uppercase; }
    .bisech-nav-links { display:flex; align-items:center; gap:30px; }
    .bisech-nav-links a { color:#36443d; text-decoration:none; font-size:14px; font-weight:600; }
    .bisech-nav-links a:hover { color:var(--bisech-clay); }
    .bisech-btn { display:inline-flex; align-items:center; justify-content:center; gap:10px; min-height:48px; padding:0 21px; border-radius:3px; background:var(--bisech-forest); color:white!important; text-decoration:none!important; font-weight:700; font-size:14px; transition:transform .2s,background .2s; }
    .bisech-btn:hover { background:var(--bisech-deep); transform:translateY(-2px); }
    .bisech-btn-clay { background:var(--bisech-clay); }
    .bisech-btn-clay:hover { background:#ad5838; }
    .bisech-hero { min-height:650px; position:relative; display:flex; align-items:center; color:#fff; background:#19372e url('{{ asset('assets/images/Bisech003.webp') }}') center 47%/cover no-repeat; }
    .bisech-hero:before { content:''; position:absolute; inset:0; background:linear-gradient(90deg,rgba(10,31,25,.82) 0%,rgba(10,31,25,.58) 48%,rgba(10,31,25,.12) 100%); }
    .bisech-hero-inner { position:relative; z-index:1; padding-block:88px 100px; }
    .bisech-eyebrow { display:flex; align-items:center; gap:12px; margin:0 0 20px; font-size:11px; font-weight:800; letter-spacing:.2em; text-transform:uppercase; }
    .bisech-eyebrow:before { content:''; width:34px; height:2px; background:var(--bisech-clay); }
    .bisech-hero h1 { max-width:760px; margin:0; font-family:Georgia,'Times New Roman',serif; font-size:clamp(42px,6vw,76px); font-weight:500; letter-spacing:-.035em; line-height:1.04; color:#fff; }
    .bisech-hero h1 em { color:#e9b28d; font-weight:400; }
    .bisech-hero-copy { max-width:550px; margin:24px 0 30px; color:rgba(255,255,255,.88); font-size:17px; line-height:1.8; }
    .bisech-hero-actions { display:flex; flex-wrap:wrap; gap:12px; }
    .bisech-btn-outline { border:1px solid rgba(255,255,255,.7); background:rgba(255,255,255,.08); }
    .bisech-hero-note { display:flex; flex-wrap:wrap; gap:22px; margin-top:48px; color:rgba(255,255,255,.85); font-size:12px; font-weight:600; }
    .bisech-hero-note span:before { content:'•'; color:#e9b28d; margin-right:9px; font-size:16px; }
    .bisech-intro { display:grid; grid-template-columns:1.05fr .95fr; gap:80px; align-items:center; padding-block:105px; }
    .bisech-section-kicker { margin:0 0 15px; color:var(--bisech-clay); font-size:11px; font-weight:800; letter-spacing:.18em; text-transform:uppercase; }
    .bisech-title { margin:0; color:var(--bisech-forest); font-family:Georgia,'Times New Roman',serif; font-size:clamp(34px,4vw,52px); font-weight:500; letter-spacing:-.03em; line-height:1.12; }
    .bisech-copy { color:#65716a; font-size:15px; line-height:1.9; }
    .bisech-intro-photo { position:relative; min-height:450px; }
    .bisech-intro-photo img { position:absolute; width:82%; height:390px; object-fit:cover; top:0; right:0; border-radius:2px; }
    .bisech-intro-photo:after { content:''; position:absolute; left:0; bottom:0; width:52%; height:230px; border:9px solid #fff; background:url('{{ asset('assets/images/slide/Bisech 004.jpeg.jpg') }}') center/cover; box-shadow:0 15px 40px #152e251f; }
    .bisech-photo-caption { position:absolute; right:0; bottom:-12px; z-index:2; background:var(--bisech-sand); padding:14px 18px; color:var(--bisech-forest); font-size:12px; font-weight:800; letter-spacing:.08em; text-transform:uppercase; }
    .bisech-services { padding-block:85px 95px; background:var(--bisech-sand); }
    .bisech-section-head { display:flex; justify-content:space-between; align-items:end; gap:30px; margin-bottom:38px; }
    .bisech-section-head .bisech-copy { max-width:390px; margin:0; }
    .bisech-service-grid { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:16px; }
    .bisech-service { display:block; padding:26px 23px 28px; min-height:220px; background:#fff; border:1px solid #eae5d9; text-decoration:none!important; transition:transform .2s,box-shadow .2s; }
    .bisech-service:hover { transform:translateY(-4px); box-shadow:0 15px 30px #1b3b3014; }
    .bisech-service-num { display:block; margin-bottom:32px; color:var(--bisech-clay); font-family:Georgia,serif; font-size:24px; }
    .bisech-service h3 { margin:0 0 10px; color:var(--bisech-forest); font-family:Georgia,serif; font-size:22px; font-weight:500; }
    .bisech-service p { margin:0; color:#6d7770; font-size:13px; line-height:1.8; }
    .bisech-trips { padding-block:100px; }
    .bisech-trip-grid { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:22px; }
    .bisech-trip { background:white; border:1px solid #e8e8e1; text-decoration:none!important; color:inherit!important; display:flex; flex-direction:column; min-width:0; transition:transform .2s,box-shadow .2s; }
    .bisech-trip:hover { transform:translateY(-4px); box-shadow:0 18px 38px #1b3b3018; }
    .bisech-trip-image { height:245px; overflow:hidden; background:#e9e6dc; }
    .bisech-trip-image img { width:100%; height:100%; object-fit:cover; transition:transform .5s; }
    .bisech-trip:hover .bisech-trip-image img { transform:scale(1.04); }
    .bisech-trip-body { padding:23px; }
    .bisech-trip-label { color:var(--bisech-clay); font-size:10px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
    .bisech-trip h3 { margin:9px 0 10px; color:var(--bisech-forest); font-family:Georgia,serif; font-size:25px; font-weight:500; line-height:1.2; }
    .bisech-trip p { margin:0; color:#69746d; font-size:13px; line-height:1.8; }
    .bisech-trip-link { display:inline-block; margin-top:19px; color:var(--bisech-forest); font-size:12px; font-weight:800; letter-spacing:.04em; }
    .bisech-trip-link span { color:var(--bisech-clay); margin-left:7px; }
    .bisech-destinations { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
    .bisech-destination { min-height:340px; position:relative; display:flex; align-items:end; overflow:hidden; background:#173b32; text-decoration:none!important; }
    .bisech-destination img { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; transition:transform .5s; }
    .bisech-destination:hover img { transform:scale(1.04); }
    .bisech-destination:after { content:''; position:absolute; inset:0; background:linear-gradient(0deg,rgba(9,28,22,.85),rgba(9,28,22,0) 78%); }
    .bisech-destination-text { position:relative; z-index:1; padding:28px; color:#fff; }
    .bisech-destination-text small { display:block; margin-bottom:8px; color:#edb28e; font-size:10px; font-weight:800; letter-spacing:.16em; text-transform:uppercase; }
    .bisech-destination-text h3 { margin:0 0 8px; color:#fff; font-family:Georgia,serif; font-size:32px; font-weight:500; }
    .bisech-destination-text p { max-width:420px; margin:0; color:#f0f2ee; font-size:13px; line-height:1.7; }
    .bisech-process { margin-block:100px; padding:65px; display:grid; grid-template-columns:.9fr 1.1fr; gap:60px; background:var(--bisech-forest); color:#fff; }
    .bisech-process .bisech-title { color:#fff; }
    .bisech-process .bisech-copy { color:#d0dbd4; }
    .bisech-steps { display:grid; grid-template-columns:1fr 1fr; gap:28px; }
    .bisech-step { border-top:1px solid #587166; padding-top:17px; }
    .bisech-step strong { color:#e9b28d; font-family:Georgia,serif; font-size:24px; font-weight:400; }
    .bisech-step h3 { margin:12px 0 7px; color:white; font-size:15px; font-weight:700; }
    .bisech-step p { margin:0; color:#d0dbd4; font-size:13px; line-height:1.8; }
    .bisech-final-cta { margin-bottom:90px; padding:52px 58px; display:flex; justify-content:space-between; align-items:center; gap:30px; background:#f1e5d7; }
    .bisech-final-cta h2 { max-width:620px; margin:0; color:var(--bisech-forest); font-family:Georgia,serif; font-size:clamp(30px,3.5vw,44px); font-weight:500; line-height:1.15; }
    .bisech-final-cta p { margin:12px 0 0; color:#68736b; font-size:14px; }
    @media(max-width:900px) { .bisech-nav-links { gap:16px; } .bisech-intro { gap:38px; } .bisech-service-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } .bisech-trip-grid { grid-template-columns:repeat(2,minmax(0,1fr)); } .bisech-process { padding:40px; gap:35px; } }
    @media(max-width:640px) { .bisech-shell { width:min(100% - 32px,1180px); } .bisech-nav-inner { min-height:76px; } .bisech-brand img { width:42px;height:42px; } .bisech-brand-name { font-size:18px; } .bisech-nav-links a:not(.bisech-btn) { display:none; } .bisech-nav-links { gap:0; } .bisech-nav-links .bisech-btn { min-height:42px;padding:0 13px;font-size:12px; } .bisech-hero { min-height:600px;background-position:58% center; } .bisech-hero-inner { padding-block:75px 68px; } .bisech-hero-copy { font-size:15px; } .bisech-hero-note { gap:10px 18px;margin-top:35px; } .bisech-intro { grid-template-columns:1fr; padding-block:70px; gap:38px; } .bisech-intro-photo { min-height:350px; } .bisech-intro-photo img { width:85%;height:300px; } .bisech-intro-photo:after { height:165px; } .bisech-photo-caption { bottom:-4px;font-size:10px; } .bisech-services,.bisech-trips { padding-block:70px; } .bisech-section-head { display:block; } .bisech-section-head .bisech-copy { margin-top:16px; } .bisech-service-grid,.bisech-trip-grid { grid-template-columns:1fr; } .bisech-service { min-height:unset; } .bisech-service-num { margin-bottom:18px; } .bisech-trip-image { height:235px; } .bisech-destinations { grid-template-columns:1fr; } .bisech-destination { min-height:290px; } .bisech-process { margin-block:70px;padding:30px 24px;grid-template-columns:1fr;gap:30px; } .bisech-steps { gap:22px; } .bisech-final-cta { margin-bottom:60px;padding:32px 24px;display:block; } .bisech-final-cta .bisech-btn { margin-top:22px; } }
</style>
@endpush

@section('content')
<div class="bisech-home">
    <header class="bisech-nav">
        <div class="bisech-shell bisech-nav-inner">
            <a href="{{ url('/') }}" class="bisech-brand" aria-label="Bisech home">
                <img src="{{ asset('assets/images/logo.jpg') }}" alt="Bisech logo">
                <span><span class="bisech-brand-name">BISECH</span><span class="bisech-brand-sub">Travel · Tanzania</span></span>
            </a>
            <nav class="bisech-nav-links" aria-label="Main navigation">
                <a href="#experiences">Experiences</a>
                <a href="#destinations">Destinations</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a>
                <a class="bisech-btn" href="{{ \App\Support\Site::wa('Hello Bisech, I would like help planning a trip in Tanzania.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif>Plan your trip <span aria-hidden="true">↗</span></a>
            </nav>
        </div>
    </header>

    <section class="bisech-hero">
        <div class="bisech-shell bisech-hero-inner">
            <p class="bisech-eyebrow">Discover Tanzania with Bisech</p>
            <h1>Wild places.<br>Real moments.<br><em>Your kind of journey.</em></h1>
            <p class="bisech-hero-copy">From a first light game drive on the savannah to quiet days by the Indian Ocean, we help you shape a Tanzania trip around the way you want to travel.</p>
            <div class="bisech-hero-actions">
                <a class="bisech-btn bisech-btn-clay" href="{{ \App\Support\Site::wa('Hello Bisech, I would like to plan a Tanzania trip. My dates are not confirmed yet.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif>Start planning <span aria-hidden="true">↗</span></a>
                <a class="bisech-btn bisech-btn-outline" href="#experiences">Explore experiences <span aria-hidden="true">↓</span></a>
            </div>
            <div class="bisech-hero-note"><span>Wildlife safaris</span><span>Mountain journeys</span><span>Coastal escapes</span></div>
        </div>
    </section>

    <section class="bisech-shell bisech-intro">
        <div>
            <p class="bisech-section-kicker">Travel at your own pace</p>
            <h2 class="bisech-title">Tanzania is more than a destination. It’s a feeling.</h2>
            <p class="bisech-copy">The best trips leave room for the unexpected: the elephants crossing the track, a guide sharing a story, the last light over the hills. Bisech helps bring the details together, so your journey feels considered rather than rushed.</p>
            <p class="bisech-copy">Tell us what you have in mind, when you want to travel and who is coming. We’ll help you explore the options and put together a plan that fits.</p>
            <a class="bisech-btn" href="{{ route('about') }}">Get to know Bisech <span aria-hidden="true">↗</span></a>
        </div>
        <div class="bisech-intro-photo" aria-label="Tanzania wildlife and landscapes">
            <img src="{{ asset('assets/images/Bisech010 (1).jpg') }}" alt="Zebras on the Tanzanian savannah" loading="lazy">
            <span class="bisech-photo-caption">The beauty is in the details</span>
        </div>
    </section>

    <section class="bisech-services" id="experiences">
        <div class="bisech-shell">
            <div class="bisech-section-head">
                <div><p class="bisech-section-kicker">Ways to explore</p><h2 class="bisech-title">A journey that feels like yours.</h2></div>
                <p class="bisech-copy">Choose one experience or bring a few together. We can help you work out the route, timing and practical details.</p>
            </div>
            <div class="bisech-service-grid">
                <a class="bisech-service" href="{{ route('services.show', 'safaris-and-tours') }}"><span class="bisech-service-num">01 / LAND</span><h3>Safaris & tours</h3><p>Explore Tanzania’s wildlife areas, landscapes and cultural experiences.</p><span class="bisech-trip-link">Explore service ↗</span></a>
                <a class="bisech-service" href="{{ route('services.show', 'mountain-climbing') }}"><span class="bisech-service-num">02 / CLIMB</span><h3>Mountain climbing</h3><p>Discuss Kilimanjaro routes, timing and preparation for your journey.</p><span class="bisech-trip-link">Explore service ↗</span></a>
                <a class="bisech-service" href="{{ route('services.show', 'zanzibar-and-coastal-holidays') }}"><span class="bisech-service-num">03 / COAST</span><h3>Zanzibar & coast</h3><p>Plan island time, coastal stays and connections with a wider trip.</p><span class="bisech-trip-link">Explore service ↗</span></a>
                <a class="bisech-service" href="{{ route('services.show', 'car-hire-and-transport') }}"><span class="bisech-service-num">04 / DRIVE</span><h3>Car hire & transport</h3><p>Ask about driver options, airport transfers and longer journeys.</p><span class="bisech-trip-link">Explore service ↗</span></a>
                <a class="bisech-service" href="{{ route('services.show', 'flight-bookings') }}"><span class="bisech-service-num">05 / FLY</span><h3>Flight assistance</h3><p>Discuss domestic connections and flight arrangements for your dates.</p><span class="bisech-trip-link">Explore service ↗</span></a>
                <a class="bisech-service" href="{{ route('services.show', 'cargo-and-corporate-transport') }}"><span class="bisech-service-num">06 / BUSINESS</span><h3>Corporate & cargo</h3><p>Make an enquiry about business transport or cargo-related needs.</p><span class="bisech-trip-link">Explore service ↗</span></a>
            </div>
        </div>
    </section>

    @php
        $liveTours = isset($tours) ? collect($tours) : collect();
        $fallbackTours = [
            ['title' => 'Serengeti & the Northern Circuit', 'label' => 'Wildlife safari', 'description' => 'Build a safari around open plains, wildlife viewing and the parks that interest you most.', 'image' => 'assets/images/slide/bisech005.jpg'],
            ['title' => 'Kilimanjaro & the Highlands', 'label' => 'Mountain journey', 'description' => 'Explore trekking routes, preparation and timing for a climb in the Kilimanjaro region.', 'image' => 'assets/images/slide/Bisech 006.webp'],
            ['title' => 'Zanzibar & the Coast', 'label' => 'Coastal escape', 'description' => 'Pair time by the Indian Ocean with local culture and the kind of pace you prefer.', 'image' => 'assets/images/listing/5.jpg'],
        ];
    @endphp
    <section class="bisech-shell bisech-trips" id="trips">
        <div class="bisech-section-head">
            <div><p class="bisech-section-kicker">A few places to begin</p><h2 class="bisech-title">Find your starting point.</h2></div>
            <p class="bisech-copy">These are ideas, not fixed itineraries. Tell us your dates and we can discuss what makes sense for your trip.</p>
        </div>
        <div class="bisech-trip-grid">
            @if ($liveTours->isNotEmpty())
                @foreach ($liveTours->take(6) as $tour)
                    <a class="bisech-trip" href="{{ route('packages.show', $tour->slug) }}">
                        <div class="bisech-trip-image">
                                    @php
                                        $tourImage = $tour->image ?? null;

                                        $imageUrl = $tourImage
                                            ? (\Illuminate\Support\Str::startsWith($tourImage, 'assets/')
                                                ? asset($tourImage)
                                                : asset('storage/' . ltrim($tourImage, '/')))
                                            : asset('assets/images/slide/Bisech003.webp');
                                    @endphp

                                    <img
                                        src="{{ $imageUrl }}"
                                        alt="{{ $tour->title }}"
                                        loading="lazy"
                                        onerror="this.onerror=null; this.src='{{ asset('assets/images/slide/Bisech003.webp') }}';"
                                    >
                            </div>
                        <div class="bisech-trip-body"><span class="bisech-trip-label">Explore with Bisech</span><h3>{{ $tour->title }}</h3><p>{{ \Illuminate\Support\Str::limit($tour->description ?: $tour->paragraph ?: 'Talk to us about shaping this experience around your dates and interests.', 145) }}</p><span class="bisech-trip-link">Ask about this trip <span>↗</span></span></div>
                    </a>
                @endforeach
            @else
                @foreach ($fallbackTours as $trip)
                    <a class="bisech-trip" href="{{ \App\Support\Site::wa('Hello Bisech, please help me plan: ' . $trip['title'] . '.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif>
                        <div class="bisech-trip-image"><img src="{{ asset($trip['image']) }}" alt="{{ $trip['title'] }}" loading="lazy"></div>
                        <div class="bisech-trip-body"><span class="bisech-trip-label">{{ $trip['label'] }}</span><h3>{{ $trip['title'] }}</h3><p>{{ $trip['description'] }}</p><span class="bisech-trip-link">Ask about this trip <span>↗</span></span></div>
                    </a>
                @endforeach
            @endif
        </div>
    </section>

    <section class="bisech-shell" id="destinations">
        <div class="bisech-section-head"><div><p class="bisech-section-kicker">From savannah to sea</p><h2 class="bisech-title">Two sides of Tanzania.<br>Countless ways to see it.</h2></div><p class="bisech-copy">Start with the landscape that calls to you, then we can help you decide what to combine it with.</p></div>
        <div class="bisech-destinations">
            <a class="bisech-destination" href="{{ \App\Support\Site::wa('Hello Bisech, I am interested in a Tanzania wildlife safari.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif><img src="{{ asset('assets/images/slide/Bisech003.webp') }}" alt="Elephants in Tanzania with Mount Kilimanjaro in the distance" loading="lazy"><span class="bisech-destination-text"><small>Wild Tanzania</small><h3>Into the wild</h3><p>Wildlife, wide horizons and days shaped around the rhythm of the bush.</p></span></a>
            <a class="bisech-destination" href="{{ \App\Support\Site::wa('Hello Bisech, I am interested in a Zanzibar or Tanzania coast holiday.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif><img src="{{ asset('assets/images/listing/5.jpg') }}" alt="Traditional dhow on a tropical beach" loading="lazy"><span class="bisech-destination-text"><small>Indian Ocean</small><h3>Find your coast</h3><p>Warm water, coastal flavours and time to take the day as it comes.</p></span></a>
        </div>
    </section>

    <section class="bisech-shell bisech-process">
        <div><p class="bisech-section-kicker">Simple from the start</p><h2 class="bisech-title">Good trips begin with a conversation.</h2><p class="bisech-copy">You don’t need every detail figured out before you reach us. Start with an idea and we’ll work through the practical bits together.</p><a class="bisech-btn bisech-btn-clay" href="{{ \App\Support\Site::wa('Hello Bisech, I would like to discuss a trip to Tanzania.') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif>Talk through your plans <span aria-hidden="true">↗</span></a></div>
        <div class="bisech-steps">
            <div class="bisech-step"><strong>01</strong><h3>Share your idea</h3><p>Let us know when you hope to travel, how many people are coming and what you enjoy.</p></div>
            <div class="bisech-step"><strong>02</strong><h3>Shape the route</h3><p>We discuss destinations, timing and the arrangements that suit your plans.</p></div>
            <div class="bisech-step"><strong>03</strong><h3>Review the details</h3><p>Get a clear proposal to review before you decide how to proceed.</p></div>
            <div class="bisech-step"><strong>04</strong><h3>Get ready to go</h3><p>Once details are agreed, confirm the arrangements and prepare for your trip.</p></div>
        </div>
    </section>

    <section class="bisech-shell bisech-final-cta">
        <div><h2>Have a place in mind, or just a feeling?</h2><p>Tell Bisech a little about the trip you want to take. We’ll start from there.</p></div>
        <a class="bisech-btn" href="{{ \App\Support\Site::wa('Hello Bisech, I would like help planning a trip. Here is what I have in mind:') }}" @if (\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif>Let’s plan it <span aria-hidden="true">↗</span></a>
    </section>
</div>
@endsection
