<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script src="https://kit.fontawesome.com/f5e9870331.js" crossorigin="anonymous"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <livewire:styles>
</head>
<body class="font-sans bg-gray-100">
    @include('layouts.header')
    <div id="app">
    @yield('content')
    </div>
    @include('layouts.footer')
    <livewire:scripts>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
</body>
</html>