<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        // Redirect to dashboard if already authenticated
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Attempt to log the user in
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Authentication passed
            $request->session()->regenerate();
            
            return redirect()->intended('admin/dashboard')->with('success', 'Successfully logged in!');
        }

        // Authentication failed
        return redirect()->back()
            ->withErrors(['email' => 'Invalid credentials'])
            ->withInput($request->except('password'));
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Successfully logged out!');
    }

    /**
     * Show the signup form
     */
    public function showSignupForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('signup');
    }

    /**
     * Handle signup request
     */
    public function signup(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Account created successfully!');
    }

    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    /**
     * Handle forgot password request
     */
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Here you would typically send a password reset email
        // For now, we'll just redirect with a success message
        
        return redirect()->back()->with('success', 'Password reset link sent to your email!');
    }
}

