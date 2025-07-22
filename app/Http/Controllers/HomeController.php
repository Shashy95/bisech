<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Tour;

class HomeController extends Controller
{
   public function index()
{
    $slides = \App\Models\Slide::select('title', 'subtitle', 'description', 'image')->get();
    $tours = Tour::latest()->get();
    return view('index', compact('slides', 'tours'));
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
