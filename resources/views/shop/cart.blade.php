@extends('layouts.layout')

@section('content')
    <x-bread-crumb>
        <a href="/">Home</a>
        <i class="fas fa-chevron-right"></i>
        <span>Shopping Cart</span>
    </x-bread-crumb>
    <div class="bg-white">
        <div class="container mx-auto py-16">
             @if (session()->has('success_message'))
                <x-alert color="green" width="w-3/5" :message="session()->get('success_message')"/>
            @endif
            @if(count($errors) > 0)
                <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 w-3/5 mb-4 rounded" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li >{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
            @endif
            @if(Cart::instance('default')->count() > 0)
            <h2 class="font-semibold text-xl pb-6">{{Cart::instance('default')->count()}} item(s) in Shopping Cart</h2>
            @foreach(Cart::instance('default')->content() as $item)
            <div class="flex items-center py-2 border-t-2 w-3/5">
                <div class="w-24 mr-12">
                    <img src="{{asset('images/products/laptop-1.jpg')}}" alt="{{$item->model->slug}}">
                </div>
                <div class="w-64 mr-12">
                    <div><a href="{{route('shop.show', ['slug'=>$item->model->slug])}}" class="font-semibold">{{$item->model->name}}</a></div>
                    <p>{{$item->model->details}}</p>
                </div>
                <div class="w-32 mr-12">
                    <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="float-right">Remove</button>
                    </form>
                    <form action="{{route('cart.saveForLater', $item->rowId)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="float-right">Save for Later</button>
                    </form>
                </div>
                <div class="w-8 mr-12">
                <div class="relative">
                    <select class="p-1 rounded bg-white border border-black quantity" data-id="{{$item->rowId}}">
                    @for ($i = 1; $i < 5 + 1 ; $i++)
                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                    </select>
                </div>
                </div>
                <div class="w-1/6">
                    <p class="text-xl font-normal">{{presentPrice($item->subtotal)}}</p>
                </div>
            </div>
            @endforeach
            <div class="w-3/5 my-8 flex items-center bg-gray-300 p-4 border-t-2">
                <div class="w-2/3 pr-8">
                    <p>Shipping is free because we're awesome like that and we don't wan't to be extra burden on customers.</p>
                </div>
                <div class="w-1/3">
                    <div class="flex items-center">
                        <p class="w-1/2 float-right">SubTotal</p>
                        <p class="w-1/2">{{presentPrice($newSubTotal)}}</p>
                    </div>
                    <div class="flex items-center">
                        <p class="w-1/2">Tax({{$tax}}%)</p>
                        <p class="w-1/2">{{presentPrice($newTax)}}</p>
                    </div>
                    <div class="flex items-center font-semibold">
                        <p class="w-1/2">Total</p>
                        <p class="w-1/2">{{presentPrice($newTotal)}}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center w-3/5 pb-6">
                <div class="w-1/2">
                    <a href="{{route('shop.index')}}" class="p-2 hover:text-gray-100 hover:bg-gray-900 border border-black rounded">Continue Shopping</a>
                </div>
                <div class="w-1/2">
                    <a href="{{route('checkout.index')}}" class="p-2 bg-teal-700 text-white rounded float-right">Continue to Checkout</a>
                </div>
            </div>
            @else
                <div class="pb-6">
                <p class="py-8">Your cart is empty!</p>
                <a href="{{route('shop.index')}}" class="p-2 hover:text-gray-100 hover:bg-gray-900 border border-black rounded">Continue Shopping</a>
                </div>
            @endif
            @if(Cart::instance('saveForLater')->count() > 0)
            <h2 class="font-semibold text-xl pb-6">{{Cart::instance('saveForLater')->count()}} item(s) are Saved For Later</h2>
            @foreach(Cart::instance('saveForLater')->content() as $item)
            <div class="flex items-center py-2 border-t-2 w-3/5">
                <div class="w-24 mr-12">
                    <img src="{{asset('images/products/laptop-1.jpg')}}" alt="{{$item->model->slug}}">
                </div>
                <div class="w-64 mr-12">
                    <div><a href="{{route('shop.show', ['slug'=>$item->model->slug])}}" class="font-semibold">{{$item->model->name}}</a></div>
                    <p>{{$item->model->details}}</p>
                </div>
                <div class="w-32 mr-12">
                    <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="float-right">Remove</button>
                    </form>
                    <form action="{{route('saveForLater.switchToCart', $item->rowId)}}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="float-right">Add to Cart</button>
                    </form>
                </div>
                <div class="w-8 mr-12">
                <div class="relative">
                    <select class="p-1 rounded bg-white border border-black">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    </select>
                </div>
                </div>
                <div class="w-1/6">
                    <p class="text-xl font-normal">{{presentPrice($item->subtotal)}}</p>
                </div>
            </div>
            @endforeach
            @else
                <div class="border-t-2 w-3/5"><p class="py-8">You have no items saved for later!</p></div>
            @endif
        </div>
    </div>
    <x-also-like :mightAlsoLike="$mightAlsoLike" />
@endsection
@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
        (function(){
            const classnames = document.querySelectorAll('.quantity');

            Array.from(classnames).forEach(function(element){
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-id');
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value
                    })
                    .then(function (response) {
                        window.location.href = '{{route("shop.cart")}}';
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.href = '{{route("shop.cart")}}';
                    });
                })
            })
        })()
    </script>
@endsection