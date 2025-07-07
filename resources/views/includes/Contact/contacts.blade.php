@php
$contacts = [
    [
        'icon' => 'phone', 
        'name' => 'Call Us',
        'title' => 'Reach us directly during business hours.',
        'info' => '+255 718 420 969',
        'link' => 'tel:+255718420969',
        'type' => '',
        'style' => '',
    ],
    [
        'icon' => 'mail', 
        'name' => 'Send Us a Message',
        'title' => 'Send us your questions or feedback anytime.',
        'info' => 'info@bisech.co.tz',
        'link' => 'mailto:info@bisech.co.tz',
        'type' => '',
        'style' => '',
    ],
   [
        'icon' => 'map-pin', 
        'name' => 'Our Address',
        'title' => 'Visit our office at the heart of Dar es Salaam.',
        'info' => "DERM Plaza, 7th Floor<br>Makumbusho,<br>Dar es Salaam, Tanzania.",
        'link' => '#',
        'type' => '',
        'style' => '',
    ]
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
                <a href="{{ $item['link'] }}"
                data-type="{{ $item['type'] }}" class="{{ $item['style'] }} text-red-500 font-medium">  {!! $item['info'] !!}</a>
            </div>
        </div>
    </div>
@endforeach