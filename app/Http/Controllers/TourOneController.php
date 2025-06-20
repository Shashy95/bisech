<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourOneController extends Controller
{
    public function show($title)
    {
        $packages = [
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
            [
                'id' => 3,
                'img' => 'assets/images/listing/3.jpg', 
                'location' => 'Maldivas',
                'title' => 'Discover Greece',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 4,
                'img' => 'assets/images/listing/4.jpg', 
                'location' => 'USA',
                'title' => 'Museum of Modern Art',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 5,
                'img' => 'assets/images/listing/5.jpg', 
                'location' => 'Bali',
                'title' => 'Peek Mountain View',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 6,
                'img' => 'assets/images/listing/6.jpg', 
                'location' => 'Bangkok',
                'title' => 'Hot Baloon Journey',
                'price-d' => '$ 58 / Day',
                'discount' => '25% Off',
            ],
            [
                'id' => 7,
                'img' => 'assets/images/listing/7.jpg', 
                'location' => 'Singapore',
                'title' => 'Orca Camp Kayaking Trip',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 8,
                'img' => 'assets/images/listing/8.jpg', 
                'location' => 'Thailand',
                'title' => 'Caño Cristales River Trip',
                'price-d' => '$ 58 / Day',
                'discount' => '20% Off',
            ],
            [
                'id' => 9,
                'img' => 'assets/images/listing/9.jpg', 
                'location' => 'Pattaya',
                'title' => 'Osa Peninsula to Dominical',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 10,
                'img' => 'assets/images/listing/10.jpg', 
                'location' => 'Lakshadweep',
                'title' => 'History of The Emporer',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 11,
                'img' => 'assets/images/listing/11.jpg', 
                'location' => 'Paris',
                'title' => 'Wildness of Paris',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ],
            [
                'id' => 12,
                'img' => 'assets/images/listing/12.jpg', 
                'location' => 'London',
                'title' => 'The Hills and Mountains',
                'price-d' => '$ 58 / Day',
                'discount' => 'false',
            ]
        ];

        // Find the package by ID
        $item = collect($packages)->first(function ($package) use ($title) {
            return Str::slug($package['title']) === $title;
        });

        // If package not found, return 404 error
        if (!$item) {
            abort(404);
        }

        // Return the view and pass the package data to the view
        return view('tour-detail-one', compact('item'));
    }
}