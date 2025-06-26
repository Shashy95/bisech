@extends('layouts.no-header')

@section('title', 'Login Page')

@section('content')
<section class="md:h-screen py-36 flex items-center relative overflow-hidden zoom-image">
    <div class="absolute inset-0 image-wrap z-1 bg-no-repeat bg-center bg-cover" style="background-image: url('{{ asset('assets/images/bg/6.jpg') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900 z-2" id="particles-snow"></div>
    <div class="container relative z-3">
        <div class="flex justify-center">
            <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-700 rounded-md">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold">Login</h5>
                
               

                <form class="text-start" method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="grid grid-cols-1">
                        <div class="mb-4">
                            <label class="font-semibold" for="LoginEmail">Email Address:</label>
                            <input id="LoginEmail" name="email" type="email" value="{{ old('email') }}" class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-black rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0" placeholder="name@example.com" required>
                        </div>

                        <div class="mb-4 relative">
                        <label class="font-semibold" for="LoginPassword">Password:</label>
                        <input
                            id="LoginPassword"
                            name="password"
                            type="password"
                            class="mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-black rounded outline-none border border-gray-100 dark:border-gray-800 focus:ring-0 pr-10"
                            placeholder="Password:"
                            required>

                            <button type="button"
                            onclick="togglePassword()"
                            class="absolute top-13 right-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                      </button>
                        </div>

                        <div class="flex justify-between mb-4">
                            <div class="flex items-center mb-0">
                                <input class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-red-600 checked:appearance-auto dark:accent-red-600 focus:border-red-300 focus:ring-0 focus:ring-offset-0 focus:ring-red-200 focus:ring-opacity-50 me-2" type="checkbox" name="remember" value="1" id="RememberMe">
                                <label class="form-checkbox-label text-slate-400" for="RememberMe">Remember me</label>
                            </div>
                            <p class="text-slate-400 mb-0"><a href="" class="text-slate-400">Forgot password ?</a></p>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="py-2 px-5 inline-block tracking-wide align-middle duration-500 text-base text-center bg-red-500 hover:bg-red-600 text-white rounded-md w-full">Login</button>
                        </div>

                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
  function togglePassword() {
    const input = document.getElementById('LoginPassword');
    const icon = document.getElementById('eyeIcon');
    const isPassword = input.type === 'password';

    input.type = isPassword ? 'text' : 'password';

    // Toggle icon to show eye/eye-off if you wish (optional)
    icon.innerHTML = isPassword
      ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.269-2.943-9.543-7a9.956 9.956 0 013.433-4.601M6.06 6.06l11.88 11.88"/>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9.88 9.88a3 3 0 104.24 4.24"/>`
      : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
  }
</script>
@endsection









