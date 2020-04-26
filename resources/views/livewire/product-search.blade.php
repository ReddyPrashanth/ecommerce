<div class="w-1/3" class="relative">
    <input  wire:model.debounce.500ms="search" type="text" class="text-sm focus:outline-none focus:shadow-outline pl-8 py-2 w-full rounded-full" placeholder="You can search products here ...">
        <div class="absolute">
            <svg class="fill-current w-4 text-gray-500 -mt-6 ml-2" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
        </div>
    <div wire:loading class="absolute spinner right-0 top-0 -mt-12 py-8" style="margin-left: 25rem;"></div>
    @if(strlen($search) > 2)
        <div class="absolute bg-gray-400 mt-2 rounded">
           <ul>
            @forelse($products as $product)
                <li class="border-b border-white">
                 <a href="{{route('shop.show', ['slug'=>$product->slug])}}" class="block hover:bg-gray-700 hover:text-white px-3 py-3 flex items-center transition ease-in-out duration-150">
                        <p class="ml-4">{{ $product->name }} <span class="ml-64">{{$product->presentPrice()}}</span></p>
                 </a>
                </li>
            @empty
            <li class="border-b border-white mr-64">
                <p class="block hover:bg-gray-700 hover:text-white px-3 py-3 flex items-center transition ease-in-out duration-150">No results for {{$search}}</p>
            </li>
            @endforelse
           </ul>
        </div>
    @endif
</div>
