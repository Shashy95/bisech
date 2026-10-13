@php
    $socialIcons = ['facebook' => 'facebook', 'instagram' => 'instagram', 'twitter' => 'twitter', 'linkedin' => 'linkedin'];
@endphp
<footer class="bisech-footer">
    <style>
        .bisech-footer { background:#102b25; color:#d3ded7; padding-top:54px; }
        .bisech-footer-inner { width:min(1180px,calc(100% - 44px)); margin:auto; display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:48px; padding-bottom:42px; }
        .bisech-footer .bisech-btn { display:inline-flex; align-items:center; justify-content:center; min-height:44px; padding:0 18px; background:#c66a45; color:#fff; font-weight:700; border-radius:3px; text-decoration:none; }
        .bisech-footer .bisech-btn:hover { background:#ad5838; color:#fff; }
        .bisech-footer h3 { color:#fff; font-family:Georgia,'Times New Roman',serif; font-size:24px; font-weight:500; margin:0 0 14px; }
        .bisech-footer h4 { color:#e9b28d; font-size:10px; letter-spacing:.17em; text-transform:uppercase; margin:4px 0 17px; }
        .bisech-footer p,.bisech-footer a { color:#c6d1ca; font-size:13px; line-height:1.9; }
        .bisech-footer a { text-decoration:none; }
        .bisech-footer a:hover { color:#fff; }
        .bisech-footer-links { display:flex; flex-direction:column; gap:5px; }
        .bisech-footer-bottom { border-top:1px solid #365248; padding:18px 0; }
        .bisech-footer-bottom-inner { width:min(1180px,calc(100% - 44px)); margin:auto; display:flex; justify-content:space-between; gap:20px; font-size:11px; color:#aabbb0; }
        @media(max-width:640px) { .bisech-footer-inner { width:calc(100% - 32px); grid-template-columns:1fr; gap:28px; } .bisech-footer-bottom-inner { width:calc(100% - 32px); display:block; } }
    </style>
    <div class="bisech-footer-inner">
        <div>
            <h3>{{ config('site.name', 'Bisech') }}</h3>
            <p>Thoughtful journeys across Tanzania — from wildlife and mountain landscapes to the Indian Ocean coast.</p>
            @if (count(\App\Support\Site::social()))
                <div style="display:flex;gap:14px;margin-top:18px">
                    @foreach (\App\Support\Site::social() as $network => $url)
                        <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($network) }}">{{ ucfirst($network) }}</a>
                    @endforeach
                </div>
            @endif
        </div>
        <div>
            <h4>Explore</h4>
            <div class="bisech-footer-links">
                <a href="{{ url('/') }}#experiences">Experiences</a>
                <a href="{{ url('/') }}#trips">Trip ideas</a>
                <a href="{{ url('/') }}#destinations">Destinations</a>
                <a href="{{ route('about') }}">About Bisech</a>
                <a href="{{ route('contact') }}">Contact</a>
            </div>
        </div>
        <div>
            <h4>Start a conversation</h4>
            <p>Have dates in mind or still exploring? Tell us what you would like to experience and we can discuss the next steps.</p>
            @if (\App\Support\Site::hasWhatsapp())
                <a href="{{ \App\Support\Site::wa('Hello ' . config('site.name', 'Bisech') . ', I would like help planning a trip in Tanzania.') }}" target="_blank" rel="noopener" class="bisech-btn" style="margin-top:8px">Message us on WhatsApp ↗</a>
            @else
                <a href="{{ route('contact') }}" class="bisech-btn" style="margin-top:8px">Send an enquiry ↗</a>
            @endif
            @if (config('site.email'))<p style="margin-top:15px"><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a></p>@endif
            @if (config('site.phone'))<p style="margin-top:4px"><a href="{{ \App\Support\Site::telHref() }}">{{ config('site.phone') }}</a></p>@endif
            @if (config('site.address'))<p style="margin-top:4px">{!! nl2br(e(config('site.address'))) !!}</p>@endif
        </div>
    </div>
    <div class="bisech-footer-bottom"><div class="bisech-footer-bottom-inner"><span>© {{ date('Y') }} {{ config('site.name', 'Bisech') }}. All rights reserved.</span><span>Tanzania, thoughtfully explored.</span></div></div>
</footer>
