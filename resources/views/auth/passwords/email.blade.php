@extends('layouts.layout')

@section('content')
<div class="bg-white min-h-screen">
    <div class="container w-1/3 mx-auto py-24">
    <div class="p-4 bg-gray-200 border rounded-t font-medium text-lg shadow">Password Reset</div>
        <div class="border p-8 rounded-b shadow">
            @if (session('status'))
            <x-alert color="green" width="w-full" :message="session('status')"/>            
            @endif
            <form method="POST"  action="{{ route('password.email') }}">
            @csrf
            <div class="px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="email" name="email" type="text" placeholder="Email Address" value="{{ $email ?? old('email') }}" required autocomplete="email"> 
                @error('email')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            <div class="px-3 mb-6 flex">
                <button type="submit" class="bg-blue-600 px-4 py-2 rounded text-white mr-2">{{ __('Send Password Reset Link') }}</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
