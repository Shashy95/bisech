<?php

/*
 |--------------------------------------------------------------------------
 | Site identity & contact details
 |--------------------------------------------------------------------------
 | Everything a visitor sees about "who we are" lives here, so the demo can be
 | re-skinned for a real client by changing .env only (no view edits).
 |
 | SITE_DEMO=true  -> adds <meta robots noindex> and a "Demo website" footer note.
 | Leave SITE_PHONE / SITE_EMAIL / SITE_WHATSAPP empty to show clearly-marked
 | placeholders (and no tap-to-call / mailto links).
 */

return [
    'name'        => env('SITE_NAME', 'Bisech'),
    'title'       => env('SITE_TITLE', 'Bisech | Safaris, Car Hire & Flights in Tanzania'),
    'description' => env('SITE_DESCRIPTION', 'Plan your Tanzania trip with Bisech: Kilimanjaro treks, Zanzibar beach holidays, car hire and flight booking. Message us on WhatsApp for a quote.'),

    'demo'        => filter_var(env('SITE_DEMO', true), FILTER_VALIDATE_BOOLEAN),

    'phone'       => env('SITE_PHONE'),        // e.g. "+255 7XX XXX XXX"
    'whatsapp'    => env('SITE_WHATSAPP'),     // digits only, e.g. 2557XXXXXXXX
    'email'       => env('SITE_EMAIL'),        // e.g. info@client.co.tz
    'address'     => env('SITE_ADDRESS'),      // multi-line allowed with "\n"
    'hours'       => env('SITE_HOURS', 'Mon-Sat: 8am to 6pm'),
    'map_query'   => env('SITE_MAP_QUERY', 'Dar es Salaam, Tanzania'),

    // Contact-form messages are delivered here.
    'inbox_email' => env('SITE_INBOX_EMAIL'),

    // Bring back the unused Shreethemes demo pages (grid, blog, user-*, ...) while developing.
    'template_pages' => filter_var(env('SITE_TEMPLATE_PAGES', false), FILTER_VALIDATE_BOOLEAN),

    // Only shown when set.
    'social' => [
        'facebook'  => env('SITE_FACEBOOK'),
        'instagram' => env('SITE_INSTAGRAM'),
        'twitter'   => env('SITE_TWITTER'),
        'linkedin'  => env('SITE_LINKEDIN'),
    ],
];
