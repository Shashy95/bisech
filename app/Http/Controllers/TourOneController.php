<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourOneController extends Controller
{
    public function show($title)
    {
        $packages = $this->getPackages();

        $item = collect($packages)->first(function ($package) use ($title) {
            return Str::slug($package['title']) === $title;
        });

        if (!$item) {
            abort(404);
        }

        return view('tour-detail-one', compact('item'));
    }

    public function showDetailTwo($slug)
    {
        $packages = $this->getPackages();

        $item = collect($packages)->first(function ($package) use ($slug) {
            return Str::slug($package['title']) === $slug;
        });

        if (!$item) {
            abort(404);
        }

        return view('tour-detail-two', compact('item'));
    }

    private function getPackages()
    {
        return [
            [
                'id' => 1,
                'img' => 'assets/images/listing/1.jpg', 
                'location' => 'Dubai',
                'title' => 'Cuba Sailing Adventure',
                'price-d' => '$ 58 / Day',
                'discount' => '10% Off',
            ],
            [
                'id' => 2,
                'img' => 'assets/images/listing/2.jpg', 
                'location' => 'Italy',
                'title' => 'Tour in New York',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            // ... rest of the packages ...
        ];
    }
}
