<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Tour;
use App\Models\Destination;

class HomeController extends Controller
{
public function index()
{
    $slides = Slide::select('title', 'subtitle', 'description', 'image')->get();
    $tours = Tour::latest()->get();
    $destinations = Destination::latest()->get(); // Add this line
    return view('index', compact('slides', 'tours', 'destinations')); // Pass to view
}

public function serviceDetail($slug)
{
    $services = [
        'safaris-and-tours' => ['title' => 'Safaris & Tours', 'eyebrow' => 'Wildlife · Culture · Landscapes', 'image' => 'assets/images/slide/bisech005.jpg', 'intro' => 'Explore Tanzania’s wildlife areas and remarkable landscapes with a trip shaped around your available time, interests and travel style.', 'details' => ['Serengeti and the Northern Circuit', 'Ngorongoro, Tarangire and other parks to discuss', 'Cultural excursions and local experiences', 'Private trips or group travel enquiries'], 'note' => 'Share your preferred travel dates, group size and the places you hope to see. We can discuss route options and prepare a proposal for your review.'],
        'car-hire-and-transport' => ['title' => 'Car Hire & Transport', 'eyebrow' => 'Flexible journeys · Ground transport', 'image' => 'assets/images/slide/Bisech 008.jpeg.jpg', 'intro' => 'Arrange ground transport for airport arrivals, city travel, day trips, longer journeys and group movements across Tanzania.', 'details' => ['Car hire enquiries with or without a driver', 'Safari and intercity transport requests', 'Group and executive transport enquiries', 'Route, date and passenger-based planning'], 'note' => 'Tell us the route, dates, number of passengers and whether you need a driver. Vehicle options and availability are confirmed when you enquire.'],
        'airport-transfers' => ['title' => 'Airport Transfers', 'eyebrow' => 'Arrivals · Departures · Pick-ups', 'image' => 'assets/images/slide/Bisech011.jpg', 'intro' => 'Make the transfer between the airport and your hotel, meeting or onward destination part of a well-organised journey.', 'details' => ['Airport pick-up and drop-off requests', 'Hotel and accommodation transfers', 'Connections with tours and onward travel', 'Individual and group transfer enquiries'], 'note' => 'When contacting us, include your arrival or departure date, flight details if available, destination and passenger count.'],
        'flight-bookings' => ['title' => 'Flight Booking Assistance', 'eyebrow' => 'Domestic · International · Connections', 'image' => 'assets/images/slide/Bisech012.webp', 'intro' => 'Ask for assistance exploring flight arrangements that fit your wider travel plan, including domestic connections and international journeys.', 'details' => ['Domestic flight enquiries within Tanzania', 'International flight booking assistance', 'Travel-date and route planning', 'Coordination with tours and transfers'], 'note' => 'Send your departure city, destination, preferred dates, passenger count and any flexibility. Fare and seat availability must be confirmed at the time of enquiry.'],
        'mountain-climbing' => ['title' => 'Mountain Climbing', 'eyebrow' => 'Kilimanjaro · Highlands · Preparation', 'image' => 'assets/images/slide/Bisech 006.webp', 'intro' => 'Explore mountain journeys in Tanzania, including Kilimanjaro climbing enquiries and the practical planning needed before setting out.', 'details' => ['Discuss available route options and trip length', 'Plan around your dates and group', 'Review preparation and equipment considerations', 'Coordinate transport and related travel arrangements'], 'note' => 'Tell us your preferred month, group size and previous hiking experience. Specific route details, operators and availability should be confirmed before booking.'],
        'zanzibar-and-coastal-holidays' => ['title' => 'Zanzibar & Coastal Holidays', 'eyebrow' => 'Indian Ocean · Island time · Culture', 'image' => 'assets/images/listing/5.jpg', 'intro' => 'Plan a coastal break with time for the Indian Ocean, local culture and a pace that complements the rest of your Tanzania trip.', 'details' => ['Zanzibar holiday enquiries', 'Coastal stays and island experiences', 'Combine a beach break with a safari', 'Discuss transfers and flight connections'], 'note' => 'Share the number of travellers, preferred dates, length of stay and the kind of holiday you have in mind. Accommodation and activity options are confirmed individually.'],
        'cargo-and-corporate-transport' => ['title' => 'Cargo & Corporate Transport', 'eyebrow' => 'Business travel · Logistics enquiries', 'image' => 'assets/images/slide/Bisech010.jpg', 'intro' => 'Contact Bisech to discuss transport and logistics requirements for business travel, staff movements or cargo-related arrangements.', 'details' => ['Corporate and staff transport requests', 'Business travel coordination', 'Cargo and logistics enquiries', 'Recurring or one-off transport requirements'], 'note' => 'For a useful first discussion, include the route, dates or frequency, passenger or cargo requirements and any special handling needs. Service scope and availability are confirmed by enquiry.'],
    ];
    abort_unless(isset($services[$slug]), 404);
    $service = $services[$slug];
    return view('service-detail', compact('service', 'slug'));
}

public function packageDetail($slug)
{
    $tour = Tour::where('slug', $slug)->firstOrFail();
    return view('package-detail', compact('tour'));
}

public function show($slug)
{
    $tour = Tour::where('slug', $slug)->firstOrFail();

    return view('tour.show', compact('tour'));
}

    public function indexTwo()
    {
        return view('index-two');  
    }

    public function indexThree()
    {
        return view('index-three');  
    }

    public function indexFour()
    {
        return view('index-four');  
    }

    public function indexFive()
    {
        return view('index-five');  
    }

    public function grid()
    {
        return view('grid');  
    }

    public function gridLeftSidebar()
    {
        return view('grid-left-sidebar');  
    }

    public function gridRightSidebar()
    {
        return view('grid-right-sidebar');  
    }

    public function list()
    {
        return view('list');  
    }
    
    public function listLeftSidebar()
    {
        return view('list-left-sidebar');  
    }

    public function listRightSidebar()
    {
        return view('list-right-sidebar');  
    }

    public function tourDetailOne()
    {
        return view('tour-detail-one');  
    }
    
    public function tourDetailTwo()
    {
        return view('tour-detail-two');  
    }

    public function aboutus()
    {
        return view('aboutus');  
    }

    public function userProfile()
    {
        return view('user-profile');  
    }

    public function userBilling()
    {
        return view('user-billing');  
    }

    public function userPayment()
    {
        return view('user-payment');  
    }

    public function userInvoice()
    {
        return view('user-invoice');  
    }

    public function userSocial()
    {
        return view('user-social');  
    }

    public function userNotification()
    {
        return view('user-notification');  
    }

    public function userSetting()
    {
        return view('user-setting');  
    }

    public function helpcenter()
    {
        return view('helpcenter');  
    }

    public function helpcenterFaqs()
    {
        return view('helpcenter-faqs');  
    }

    public function helpcenterGuides()
    {
        return view('helpcenter-guides');  
    }

    public function helpcenterSupport()
    {
        return view('helpcenter-support');  
    }

    public function login()
    {
        return view('login');  
    }

    public function signup()
    {
        return view('signup');  
    }

    public function signupSuccess()
    {
        return view('signup-success');  
    }

    public function forgotPassword()
    {
        return view('forgot-password');  
    }

    public function lockScreen()
    {
        return view('lock-screen');  
    }

    public function terms()
    {
        return view('terms');  
    }

    public function privacy()
    {
        return view('privacy');  
    }

    public function comingsoon()
    {
        return view('comingsoon');  
    }

    public function maintenance()
    {
        return view('maintenance');  
    }

    public function NotFound()
    {
        return view('404');  
    }

    public function blogs()
    {
        return view('blogs');  
    }

    public function blogStandard()
    {
        return view('blog-standard');  
    }

    public function blogDetail()
    {
        return view('blog-detail');  
    }

    public function contact()
    {
        return view('contact');  
    }
}
