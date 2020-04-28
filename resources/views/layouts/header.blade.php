<div class="bg-gray-800 text-gray-200">
    <div class="container mx-auto flex items-center py-4">
        <nav class="w-3/5">
            <a href="{{URL::route('ecommerce.home')}}" class="top-nav-item text-xl font-semibold">Laravel Ecommerce</a>
        </nav>
        <ul class="w-2/5 flex items-centeer text-sm">
            @if(!Route::is('checkout.index'))
                <li class="px-6"><a href="{{route('shop.index')}}">SHOP</a></li>
                <li class="px-6"><a href="#">ABOUT</a></li>
                <li class="px-6"><a href="#">BLOG</a></li>
                @guest
                <li class="px-6">
                    <a class="uppercase" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                
                @if (Route::has('register'))
                    <li class="px-6">
                    <a class="uppercase" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="px-6">
                    <a class="uppercase" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </li>
            @endguest
            <li class="px-6"><a href="{{route('shop.cart')}}">CART</a></li>
            @endif
            
        </ul>
    </div>
</div>