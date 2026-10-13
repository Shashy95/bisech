@extends('layouts.brand-page')
@section('title', 'Contact Bisech | Plan a Tanzania Trip')
@section('description', 'Contact Bisech about safaris, tours, mountain climbing, coastal holidays, car hire, airport transfers, flights or corporate transport.')
@section('content')
<section class="bp-hero" style="background-image:url('{{ asset('assets/images/slide/Bisech011.jpg') }}')"><div class="bp-shell bp-hero-in"><p class="bp-kicker">Get in touch</p><h1>Tell us what you’re planning.</h1><p>Have travel dates, a destination in mind or a transport requirement? Send a few details and we can start a conversation.</p></div></section>
<section class="bp-section"><div class="bp-shell bp-two" style="align-items:start"><div><p class="bp-kicker">Contact Bisech</p><h2 class="bp-title">A few details help us point you in the right direction.</h2><p class="bp-copy">Use the form to tell us what you need. You can also message us directly if that is easier.</p><div style="margin-top:28px"><h3 style="font-size:22px;color:var(--forest)">Useful details to include</h3><ul class="bp-list"><li>Travel dates or preferred period</li><li>Number of travellers or passengers</li><li>Destination, route or service required</li><li>Any preferences or questions</li></ul></div>@if(\App\Support\Site::hasWhatsapp())<a class="bp-btn alt" href="{{ \App\Support\Site::wa('Hello Bisech, I would like to make an enquiry.') }}" target="_blank" rel="noopener">Message on WhatsApp ↗</a>@endif
@if(config('site.email'))<p class="bp-copy" style="margin-top:18px"><strong>Email:</strong> <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>@endif
@if(config('site.phone'))<p class="bp-copy"><strong>Phone:</strong> <a href="{{ \App\Support\Site::telHref() }}">{{ config('site.phone') }}</a></p>@endif
</div><div><form class="bp-form" method="POST" action="{{ route('contact.send') }}">@csrf
@if(session('success'))<div style="padding:14px;background:#e4f4e8;color:#205b34;margin-bottom:18px">{{ session('success') }}</div>@endif
@if($errors->any())<div style="padding:14px;background:#fff0ed;color:#913f2a;margin-bottom:18px">{{ $errors->first() }}</div>@endif
<label for="name">Your name</label><input id="name" name="name" value="{{ old('name') }}" required autocomplete="name">
<label for="email">Email address</label><input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">
<label for="subject">What is your enquiry about?</label><input id="subject" name="subject" value="{{ old('subject', request('ref') ? 'Enquiry: '.request('ref') : '') }}" required placeholder="e.g. Safari, airport transfer, car hire">
<label for="comments">Message</label><textarea id="comments" name="comments" required placeholder="Dates, number of people, destination or other details">{{ old('comments') }}</textarea>
<button class="bp-btn" type="submit" style="border:0;cursor:pointer">Send enquiry ↗</button></form></div></div></section>
@endsection
