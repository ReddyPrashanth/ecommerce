@extends('layouts.layout')

@section('content')
    <x-bread-crumb>
        <a href="/">Home</a>
        <i class="fas fa-chevron-right"></i>
        <a href="/shop">Shop</a>
        <i class="fas fa-chevron-right"></i>
        <span>{{$product->name}}</span>
    </x-bread-crumb>
    <div class="bg-white">
        <div class="container mx-auto flex items-center py-24">
            <div class="w-1/2">
                <img class="border p-24 border-black" src="{{asset('images/products/laptop-1.jpg')}}" alt="{{$product->name}}">
            </div>
            <div class="w-1/2">
                <h2 class="text-4xl font-medium py-2">{{$product->name}}</h2>
                <p class="text-gray-600 font-semibold py-1">{{$product->details}}</p>
                <p class="text-4xl font-medium py-1">{{$product->presentPrice()}}</p>
                <p class="py-2">{{$product->description}}</p>
                <div class="mt-8">
                <form action="{{route('shop.store')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <button class="bg-gray-800 text-gray-100 px-4 py-2 rounded" type="submit">Add to cart</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-300">
        <div class="container mx-auto py-8">
                <h3 class="font-semibold py-8 text-xl">You might also like...</h3>
                <div class="flex items-center">
                @foreach($mightAlsoLike as $product)
                <div class="w-1/4 p-2">
                    <a href="{{route('shop.show', ['slug'=>$product->slug])}}"><img src="{{asset('images/products/laptop-1.jpg')}}" class="w-full h-48 rounded" alt="{{$product->slug}}"></a>
                    <div class="text-center p-2">
                        <p>{{$product->name}}</p>
                        <p>{{$product->presentPrice()}}</p>
                    </div>
                </div>
                @endforeach
                </div>
        </div>
    </div>
@endsection