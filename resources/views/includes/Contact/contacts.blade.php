@php
use App\Support\Site;
$contacts = [
    [
        'icon' => 'phone',
        'name' => 'Call Us',
        'title' => 'Reach us directly during business hours.',
        'info' => e(Site::phone()),
        'link' => Site::telHref(),
        'style' => '',
    ],
    [
        'icon' => 'mail',
        'name' => 'Send Us a Message',
        'title' => 'Send us your questions or feedback anytime.',
        'info' => e(Site::email()),
        'link' => Site::mailHref(),
        'style' => '',
    ],
    [
        'icon' => 'map-pin',
        'name' => 'Our Address',
        'title' => 'Visit our office in Dar es Salaam.',
        'info' => nl2br(e(Site::address())),
        'link' => null,
        'style' => '',
    ],
];
@endphp

@foreach ($contacts as $item)
    <div class="text-center px-6">
        <div class="relative text-transparent">
            <div class="size-20 bg-red-500/5 text-red-500 rounded-xl text-2xl flex align-middle justify-center items-center mx-auto shadow-xs dark:shadow-gray-800">
                <i data-feather="{{ $item['icon'] }}"></i>
            </div>
        </div>

        <div class="content mt-7">
            <h5 class="h5 text-lg font-semibold">{{ $item['name'] }}</h5>
            <p class="text-slate-400 mt-3">{{ $item['title'] }}</p>
            
            <div class="mt-5">
                @if ($item['link'])
                <a href="{{ $item['link'] }}" class="{{ $item['style'] }} text-red-500 font-medium">{!! $item['info'] !!}</a>
                @else
                <span class="text-red-500 font-medium">{!! $item['info'] !!}</span>
                @endif
            </div>
        </div>
    </div>
@endforeach