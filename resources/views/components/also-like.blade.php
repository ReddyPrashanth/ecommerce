<div class="bg-gray-300">
    <div class="container mx-auto py-8">
        <h3 class="font-semibold py-8 text-xl">You might also like...</h3>
        <div class="flex items-center">
            @foreach($mightAlsoLike as $product)
                <div class="w-1/4 p-2">
                    <a href="{{route('shop.show', ['slug'=>$product->slug])}}"><img src="{{asset('images/products/'.$product->slug.'.jpg')}}" class="w-full h-48 rounded" alt="{{$product->slug}}"></a>
                    <div class="text-center p-2">
                        <p>{{$product->name}}</p>
                        <p>{{$product->presentPrice()}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>