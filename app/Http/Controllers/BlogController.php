<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function show($title)
    {
        $blogs = [
            [
                'id' => 1,
                'img' => 'assets/images/blog/1.jpg', 
                'name' => 'Travel',
                'title' => 'This Spanish city is a feast for the eyes: Travosy',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 2,
                'img' => 'assets/images/blog/2.jpg', 
                'name' => 'Tour',
                'title' => 'New Zealand’s South Island brims with majestic',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 3,
                'img' => 'assets/images/blog/3.jpg', 
                'name' => 'Tourist',
                'title' => 'When you visit the Eternal Rome City: Travosy',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 4,
                'img' => 'assets/images/blog/4.jpg', 
                'name' => 'Flight',
                'title' => 'My Story When I Backpacked Around The World',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 5,
                'img' => 'assets/images/blog/5.jpg', 
                'name' => 'Arab',
                'title' => 'Organization of accounting at the enterprise',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 6,
                'img' => 'assets/images/blog/6.jpg', 
                'name' => 'Dubai',
                'title' => 'Three of the Best Day Trips to Make from Francisco',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 7,
                'img' => 'assets/images/blog/7.jpg', 
                'name' => 'Maldivas',
                'title' => 'Why Do People Travel ? Reasons People Travel in 2025',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 8,
                'img' => 'assets/images/blog/8.jpg', 
                'name' => 'News',
                'title' => 'Jungles In Australia: Vermont’s Rugged, Retro Ski Mountain',
                'desc' => "This is required when, for example, the final text is not yet available."
            ],
            [
                'id' => 9,
                'img' => 'assets/images/blog/9.jpg', 
                'name' => 'Packages',
                'title' => 'Traveller Visiting Ice Cave With Amazing Eye-catching Scenes',
                'desc' => "This is required when, for example, the final text is not yet available."
            ]
        ];

        // Find the blog by ID
        $item = collect($blogs)->first(function ($blog) use ($title) {
            return Str::slug($blog['title']) === $title;
        });

        // If blog not found, return 404 error
        if (!$item) {
            abort(404);
        }

        // Return the view and pass the blog data to the view
        return view('blog-detail', compact('item'));
    }
}