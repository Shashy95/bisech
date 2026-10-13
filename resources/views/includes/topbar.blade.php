@php
    use App\Support\Site;
    $socialIcons = ['facebook' => 'facebook', 'instagram' => 'instagram', 'twitter' => 'twitter', 'linkedin' => 'linkedin'];
@endphp
<!-- TAGLINE START-->
<div class="tagline bg-slate-900">
    <div class="container relative">
        <div class="grid grid-cols-1">
            <div class="flex items-center justify-between">
                <ul class="list-none">
                    <li class="inline-flex items-center">
                        <i data-feather="clock" class="text-red-500 size-4"></i>
                        <span class="ms-2 text-slate-300">{{ config('site.hours') }}</span>
                    </li>
                    <li class="hidden sm:inline-flex items-center ms-2">
                        <i data-feather="map-pin" class="text-red-500 size-4"></i>
                        <span class="ms-2 text-slate-300">Dar es Salaam, Tanzania</span>
                    </li>
                </ul>

                <ul class="list-none">
                    <li class="inline-flex items-center">
                        <i data-feather="phone" class="text-red-500 size-4"></i>
                        @if (Site::telHref())
                            <a href="{{ Site::telHref() }}" class="ms-2 text-slate-300 hover:text-slate-200">{{ Site::phone() }}</a>
                        @else
                            <span class="ms-2 text-slate-300">{{ Site::phone() }}</span>
                        @endif
                    </li>
                    @foreach (Site::social() as $network => $url)
                        <li class="inline-flex ms-2 mb-0"><a href="{{ $url }}" target="_blank" rel="noopener" class="text-slate-300 hover:text-red-500"><i data-feather="{{ $socialIcons[$network] ?? 'link' }}" class="size-4 align-middle" title="{{ $network }}"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div><!--end container-->
</div><!--end tagline-->
<!-- TAGLINE END-->
