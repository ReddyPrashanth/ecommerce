@extends('layouts.layout')

@section('content')
<div class="bg-white min-h-screen">
    <div class="container flex mx-auto py-24">
        <div class="w-3/5 border-r-2">
            <h2 class="text-3xl font-medium">Returning Customer</h2>
            <div class="w-3/4 mt-8 border p-8 rounded shadow-md"> 
                <form method="POST"  action="{{ route('login') }}">
                    @csrf
                    <div class="px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        {{ __('E-Mail Address') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="text" placeholder="E-Mail Address">
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                        {{ __('Password') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="password" name="password" type="password" required autocomplete="current-password" placeholder="*************">
                        @error('password')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="px-3 mb-6">
                        <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="text-sm" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <div class="px-3 mb-6">
                        <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white mr-2">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" type="submit" class="bg-blue-600 px-4 py-2 rounded text-white mr-2"> {{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                    <div class="px-3 text-center text-blue-700">
                    @if (Route::has('register'))
                        <a class="" href="{{ route('register') }}">{{ __('Create Your Account') }}</a>
                    @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="w-2/5 ml-32">
            <h2 class="text-3xl font-medium">Guest Checkout</h2>
            <div class="mt-8 border p-8 rounded shadow-md">
                <form action="#" method='POST'>
                    <div class="px-3 mb-6">
                    <p>You don't need an account to checkout. Use our simple Guest checkout option.</p>
                    </div>
                    <div class="px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                            {{ __('E-Mail Address') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="text" placeholder="E-Mail Address">
                        @error('email')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="px-3">
                        <p>Already have an account? <a class="text-blue-700" href="{{ route('login') }}">{{ __('Sign in') }}</a></p>
                        <button type="submit" class="bg-gray-700 hover:bg-gray-800 px-4 py-2 rounded text-white mt-4">{{ __('Continue as Guest') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
