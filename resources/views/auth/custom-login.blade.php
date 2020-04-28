@extends('layouts.layout')

@section('content')
<div class="bg-white min-h-screen">
    <div class="container w-1/3 mx-auto py-24">
    <div class="p-4 bg-gray-200 border rounded-t font-medium text-lg shadow">Reset Password</div>
        <div class="border p-8 rounded-b shadow">
            <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="text" placeholder="Email Address" value="{{ $email ?? old('email') }}" required autocomplete="email"> 
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
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white mr-2">{{ __('Reset Password') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
