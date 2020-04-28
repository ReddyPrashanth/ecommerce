@component('mail::message')
Hi {{$user->name}},

Welcome to {{config('app.name')}}!
Your are successfully registered and use below url to start ordering.

@component('mail::button', ['url' => 'http://ecommerce.com/home'])
{{config('app.name')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent