<div class="bg-gray-800 text-gray-200">
    <div class="container mx-auto flex items-center py-4">
        <nav class="w-2/3">
            <a href="{{URL::route('ecommerce.home')}}" class="top-nav-item text-xl font-semibold">Laravel Ecommerce</a>
        </nav>
        <ul class="w-1/3 flex items-centeer text-sm">
            @if(!Route::is('checkout.index'))
            <li class="px-6"><a href="{{route('shop.index')}}">SHOP</a></li>
            <li class="px-6"><a href="#">ABOUT</a></li>
            <li class="px-6"><a href="#">BLOG</a></li>
            @endif
            <li class="px-6"><a href="{{route('shop.cart')}}">CART</a></li>
        </ul>
    </div>
</div>