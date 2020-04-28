@extends('layouts.layout')

@section('content')
<div class="bg-white min-h-screen">
    <div class="container w-1/3 mx-auto py-24">
    <div class="p-4 bg-gray-200 border rounded-t shadow font-medium text-lg">Registration</div>
        <form class="border p-8 rounded-b shadow" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                    {{ __('Name') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="Name">
                @error('name')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            <div class="px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="text" placeholder="E-Mail Address">
                @error('email')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            <div class="px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    {{ __('Password') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="password" name="password" type="password" autocomplete="current-password" placeholder="*************">
                @error('password')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            <div class="px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password-confirm">
                    {{ __('Confirm Password') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="password-confirm" name="password_confirmation" type="password" autocomplete="current-password" placeholder="*************">
            </div>
            <div class="px-3 mb-6 flex">
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white mr-2">{{ __('Register') }}</button>
                <p class="p-2">Already have an account? <a class="text-blue-700" href="{{route('login')}}">Sign in</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
