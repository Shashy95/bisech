@extends('layouts.brand-page')
@section('title', $destination->title.' | Destinations | '.config('site.name'))
@section('description', \Illuminate\Support\Str::limit(strip_tags($destination->description ?: $destination->paragraph ?: 'Explore '.$destination->title.' with Bisech.'), 155))
@section('content')
@php
    $image = $destination->image
        ? (\Illuminate\Support\Str::startsWith($destination->image, 'assets/')
            ? asset($destination->image)
            : asset('storage/' . $destination->image))
        : asset('assets/images/slide/Bisech003.webp');
@endphp

<section class="bp-hero" style="background-image:url('{{ $image }}')"><div class="bp-shell bp-hero-in"><p class="bp-kicker">Explore Tanzania</p><h1>{{ $destination->title }}</h1><p>{{ $destination->description ?: 'Explore this destination and discuss how it might fit into your Tanzania travel plans.' }}</p></div></section>
<section class="bp-section"><div class="bp-shell bp-two"><div><p class="bp-kicker">Destination guide</p><h2 class="bp-title">Discover what this place could mean for your journey.</h2><div class="bp-copy">{!! nl2br(e($destination->paragraph ?: $destination->description ?: 'Tell us what draws you to this destination and we can discuss travel options, timing and possible connections with other places.')) !!}</div><p class="bp-copy">The best route, duration, availability and costs depend on your travel dates and preferences. Contact Bisech to discuss current options.</p><a class="bp-btn alt" href="{{ \App\Support\Site::wa('Hello Bisech, I am interested in visiting '.$destination->title.'. Please share the available options.') }}" @if(\App\Support\Site::hasWhatsapp()) target="_blank" rel="noopener" @endif>Ask about this destination ↗</a></div><img class="bp-photo" src="{{ $image }}" alt="{{ $destination->title }}" loading="lazy"></div></section>
@endsection
