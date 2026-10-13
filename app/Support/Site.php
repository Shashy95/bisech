<?php

namespace App\Support;

/**
 * Small helpers so views never hard-code contact details.
 * Unset values fall back to obvious placeholders and produce no tap-to-call /
 * mailto link, so a demo can never ring or email a real third party.
 */
class Site
{
    public static function phone(): string
    {
        return config('site.phone') ?: '+255 7XX XXX XXX';
    }

    public static function telHref(): ?string
    {
        $digits = preg_replace('/\D/', '', (string) config('site.phone'));

        return $digits ? 'tel:+' . $digits : null;
    }

    public static function email(): string
    {
        return config('site.email') ?: 'info@yourcompany.co.tz';
    }

    public static function mailHref(): ?string
    {
        return config('site.email') ? 'mailto:' . config('site.email') : null;
    }

    public static function address(): string
    {
        return config('site.address') ?: "Your office address\nDar es Salaam, Tanzania";
    }

    public static function hasWhatsapp(): bool
    {
        return (bool) preg_replace('/\D/', '', (string) config('site.whatsapp'));
    }

    /** wa.me link with a prefilled message; falls back to the contact page. */
    public static function wa(string $text = ''): string
    {
        $n = preg_replace('/\D/', '', (string) config('site.whatsapp'));
        if (! $n) {
            return url('/contact');
        }

        return 'https://wa.me/' . $n . ($text !== '' ? '?text=' . rawurlencode($text) : '');
    }

    /** Base URL to which JS appends encodeURIComponent(message). */
    public static function waBase(): string
    {
        $n = preg_replace('/\D/', '', (string) config('site.whatsapp'));

        return $n ? 'https://wa.me/' . $n . '?text=' : url('/contact') . '?ref=';
    }

    /** @return array<string,string> network => url, only those configured */
    public static function social(): array
    {
        return array_filter((array) config('site.social'));
    }
}
