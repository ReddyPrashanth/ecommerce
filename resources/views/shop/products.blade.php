@extends('layouts.layout')

@section('content')
    <x-bread-crumb>
        <a href="/">Home</a>
        <i class="fas fa-chevron-right"></i>
        <span>Shop</span>
    </x-bread-crumb>
    <div class="bg-white">
        <div class="container mx-auto flex py-16 min-h-screen">
            <div class="w-1/5">
                <h2 class="font-medium text-xl">By Category</h2>
                <ul class="pt-3">
                    @foreach($categories as $category)
                        <li class="py-2"><a href="{{route('shop.index', ['category'=>$category->slug])}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
                <!-- <h2 class="font-medium text-xl pt-4">By Price</h2>
                <ul class="pt-3">
                    <li class="py-2">$0-$700</li>
                    <li class="py-2">$700-$2500</li>
                    <li class="py-2">$2500+</li>
                </ul> -->
            </div>
            <div class="w-4/5">
                @if(session()->has('success_message'))
                <x-alert color="green" width="w-full" :message="session()->get('success_message')"/>
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
                <div class="flex items-center">
                    <div class="w-2/3">
                        <h2 class="font-medium text-4xl mb-6">{{$categoryName}}</h2>
                    </div>
                    <div class="w-1/3">
                        <p><span class="font-semibold pr-2">Sort by Price:</span><a href="{{route('shop.index', ['category'=>request()->category, 'sort'=>'high_low'])}}">High-Low</a> | <a href="{{route('shop.index', ['category'=>request()->category, 'sort'=>'low_high'])}}">Low-High</a></p>
                    </div>
                </div>
                <div class="flex flex-wrap content-start">
                    @foreach($products as $product)
                    <div class="w-1/3 p-6">
                        <a href="{{route('shop.show', ['slug' => $product->slug])}}"><img src="{{asset('images/products/'.$product->slug.'.jpg')}}" class="w-full h-48 rounded" alt="{{$product->slug}}"></a>
                        <div class="text-center p-2">
                            <p>{{$product->name}}</p>
                            <p>{{$product->presentPrice()}}</p>
                        </div>
                        <div class="text-center">
                            <select class="px-3 py-1 rounded bg-white border-2 border-black quantity focus:outline-none">
                                @for ($i = 1; $i < $product->quantity + 1 ; $i++)
                                    <option value="{{$i}}">{{ $i }}</option>
                                @endfor
                            </select>
                            <button class="cart bg-gray-800 px-2 py-1 text-white rounded hover:bg-gray-100 hover:text-black border border-gray-800" data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}">Add to cart</button>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        (function(){
            const classnames = document.querySelectorAll('.cart');

            Array.from(classnames).forEach(function(element){
                element.addEventListener('click', function(){
                    const productId = element.getAttribute('data-id');
                    const productName = element.getAttribute('data-name');
                    const productPrice = element.getAttribute('data-price');
                    const productQty = element.previousSibling.previousSibling.value;

                    axios.post('/shopping/addTocart', {
                        id: productId,
                        name: productId,
                        price: productPrice,
                        quantity: productQty
                    })
                    .then(function (response) {
                        console.log(response.data)
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                        window.location.reload();
                    });
                })
            })
        })()
    </script>
@endsection