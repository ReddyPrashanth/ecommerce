@extends('layouts.layout')

@section('content')
<div class="bg-gray-800 text-gray-200">
    <div class="container mx-auto flex items-center py-16">
        <div class="w-2/3 pr-24">
            <h2 class="text-4xl font-medium">Laravel Ecommerce Demo</h2>
            <p class="text-base py-4">
                Includes multiple products, categories, a shopping cart, a blog and a checkout system with stripe integration.
                Features like product search will be implemented in later version.
            </p>
            <div class="mx-auto flex items-center py-4">
                <button class="bg-transparent border border-gray-200 py-1 px-4 mr-3 rounded hover:bg-gray-200 hover:text-black">Blog Post</button>
                <a href="https://github.com/ReddyPrashanth/ecommerce" class="bg-transparent border border-gray-200 py-1 px-4 mr-3 rounded hover:bg-gray-200 hover:text-black" target="_blank">GitHub</a>
            </div>
        </div>
        <div class="w-1/3">
            <img src="{{asset('images/macbook.jpeg')}}" class="w-full h-64 rounded" alt="mac thumbnail">
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="container mx-auto py-8 flex flex-col justify-center">
            <h2 class="text-4xl font-medium text-center">Laravel Ecommerce</h2>
            <p class="py-4 mx-32">
               Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum qui a possimus? Tenetur mollitia vitae dolores unde! Itaque explicabo nihil quam voluptatem at corrupti, 
               deserunt dignissimos, accusamus quis, veniam corporis.
            </p>
            <div class="mx-auto flex items-center py-8">
                <button class="bg-transparent border border-gray-800 py-1 px-4 mr-3 rounded hover:bg-gray-800 hover:text-white">Featured</button>
                <button  class="bg-transparent border border-gray-800 py-1 px-4 mr-3 rounded hover:bg-gray-800 hover:text-white" target="_blank">On Sale</a>
            </div>
            <div class="flex flex-wrap content-start">
                @foreach($products as $product)
                <div class="w-1/4 p-2">
                    <a href="{{route('shop.show', ['slug'=>$product->slug])}}"><img src="{{asset('images/products/'.$product->slug.'.jpg')}}" class="w-full h-48 rounded" alt="{{$product->slug}}"></a>
                    <div class="text-center p-2">
                        <p>{{$product->name}}</p>
                        <p>{{$product->presentPrice()}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mx-auto flex items-center py-8">
                <a  href="{{route('shop.index')}}" class="bg-transparent border border-gray-800 py-1 px-4 mr-3 rounded hover:bg-gray-800 hover:text-white">View more products</a>
            </div>
    </div>
</div>
<div class="bg-gray-300">
<div class="container mx-auto py-8 flex flex-col justify-center">
            <h2 class="text-4xl font-medium text-center">Laravel Blog</h2>
            <p class="py-4 mx-32">
               Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum qui a possimus? Tenetur mollitia vitae dolores unde! Itaque explicabo nihil quam voluptatem at corrupti, 
               deserunt dignissimos, accusamus quis, veniam corporis.
            </p>
            <div class="flex flex-wrap content-start py-4">
                <div class="w-1/3 p-2">
                    <img src="{{asset('images/blog/blog1.png')}}" class="w-full h-48 rounded" alt="mac thumbnail">
                    <div class="py-2">
                        <h3 class="text-xl font-bold">Blog post title 1</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam totam asperiores, necessitatibus soluta earum odio sit consequatur iure hic commodi eveniet.</p>
                    </div>
                </div>
                <div class="w-1/3 p-2">
                    <img src="{{asset('images/blog/blog2.png')}}" class="w-full h-48 rounded" alt="mac thumbnail">
                    <div class="py-2">
                        <h3 class="text-xl font-bold">Blog post title 2</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam totam asperiores, necessitatibus soluta earum odio sit consequatur iure hic commodi eveniet.</p>
                    </div>
                </div>
                <div class="w-1/3 p-2">
                    <img src="{{asset('images/blog/blog3.png')}}" class="w-full h-48 rounded" alt="mac thumbnail">
                    <div class="py-2">
                        <h3 class="text-xl font-bold">Blog post title 3</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam totam asperiores, necessitatibus soluta earum odio sit consequatur iure hic commodi eveniet.</p>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection 