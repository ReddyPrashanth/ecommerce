@extends('layouts.layout')

@section('content')
    <div class="bg-white">
        <div class="container mx-auto flex py-16">
            <div class="w-2/3">
                @if (session()->has('success_message'))
                    <x-alert color="green" width="md:w-4/5" :message="session()->get('success_message')"/>
                @endif
                @if(count($errors) > 0)
                <div class="flex items-center bg-red-500 text-white text-sm font-bold px-4 py-3 w-full md:w-4/5 mb-4 rounded" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li >{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
                @endif
                <h2 class="text-3xl font-medium mb-4">Shipping Address</h2>
                <form action="{{route('stripe.charge')}}" class="w-full max-w-2xl"  id="payment-form" method="POST">
                    {{ csrf_field() }}
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            First Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" name="firstname" type="text" placeholder="Jane" value="{{old('firstname')}}">
                        <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Last Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" name="lastname" type="text" placeholder="Doe" value="{{old('lastname')}}">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                            Email Address
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-email" name="email" type="text" paceholder="email" value="{{old('email')}}">
                        <!-- <p class="text-gray-600 text-xs italic">Please fill out this field.</p> -->
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                            Address
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" name="address" type="text" paceholder="address, street, Apt #" value="{{old('address')}}">
                        <!-- <p class="text-gray-600 text-xs italic">Please fill out this field.</p> -->
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                            City
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="city" type="text" name="city" placeholder="Albuquerque" value="{{old('city')}}">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="state">
                            State
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="state" id="state">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="zipcode">
                            Zip
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="zipcode" name="zipcode" type="text" placeholder="90210" value="{{old('zipcode')}}">
                        </div>
                    </div>
                    <h2 class="text-3xl font-medium mt-16 mb-4">Card Details</h2>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cardholdername">
                            Name on Card
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="cardholdername" name="cardholdername" type="text" paceholder="cardholder name" value="{{old('cardholdername')}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="card-element" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Credit or debit card
                        </label>
                        <div id="card-element" class="py-3 px-2 bg-gray-200 rounded">
                        <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert" class="text-sm text-red-600"></div>
                    </div>

                    <button class="bg-teal-800 text-gray-100 p-2 mt-8 border border-teal-800 hover:bg-white hover:text-black hover:border-black rounded" id="complete-order" type="submit">Proceed to Checkout</button>
                </form>
            </div>
            <div class="w-1/3">
                <h2 class="text-3xl font-medium mb-4">Order Summary</h2>
                @foreach(Cart::instance('default')->content() as $item)
                <div class="flex items-center py-2 border-t-2">
                    <div class="w-1/5 mr-4">
                        <img src="{{asset('images/products/laptop-1.jpg')}}" alt="{{$item->model->slug}}">
                    </div>
                    <div class="w-3/5 mr-2">
                        <div><a href="{{route('shop.show', ['slug'=>$item->model->slug])}}" class="font-semibold">{{$item->model->name}}</a></div>
                        <p class="text-gray-600 text-sm">{{$item->model->details}}</p>
                        <p>{{presentPrice($item->model->price)}}</p>
                    </div>
                    <div class="w-1/5 mr-2">
                        <p class="float-right border border-black px-2 py-1">{{$item->qty}}</p>
                    </div>
                </div>
                @endforeach
                <div class="border-t-2 border-b-2 py-4">
                    <div class="flex">
                        <p class="text-sm font-semibold w-4/5">SubTotal</p>
                        <p class="float-right w-1/5">{{presentPrice($subTotal)}}</p>
                    </div>
                    @if(session()->has('coupon'))
                    <div class="flex">
                        <p class="text-sm font-semibold w-2/5">Discount ({{session()->get('coupon')['name']}}):</p>
                        <form action="{{route('coupon.destroy')}}" method="POST" class="w-2/5">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="text-sm">Remove</button>
                        </form>
                        <p class="float-right w-1/5">-{{presentPrice(session()->get('coupon')['discount'])}}</p>
                    </div>
                    <div class="flex">
                        <p class="text-sm font-semibold w-4/5">New SubTotal</p>
                        <p class="float-right w-1/5">{{presentPrice($newSubTotal)}}</p>
                    </div>
                    @endif
                    <div class="flex">
                        <p class="text-sm font-semibold w-4/5">Est. Taxes & Fees</p>
                        <p class="float-right w-1/5">{{presentPrice($newTax)}}</p>
                    </div>
                    <div class="flex">
                        <p class="text-sm font-semibold w-4/5">Est. Total</p>
                        <p class="float-right w-1/5">{{presentPrice($newTotal)}}</p>
                    </div>
                </div>
                @if(!session()->has('coupon'))
                <div id="coupon" class="border-t-2">
                    <p class="py-4">Have a Coupon Code?</p>
                    <div class="border border-gray-700 p-4">
                        <form action="{{route('coupon.apply')}}" method="POST">
                            {{csrf_field()}}
                            <input type="text" name="coupon_code" class="border-2 border-gray-400 p-2">
                            <button type="submit" class="border-2 border-gray-800 p-2">Apply</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    var key = "{{$key}}";
    var stripe = Stripe(key);
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    var style = {
    base: {
        // Add your base input styles here. For example:
        fontSize: '16px',
        color: '#32325d',
    },
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    
    card.addEventListener('change', function(event){
        var displayError = document.getElementById('card-errors');
        if(event.error){
            displayError.textContent = event.error.message;
        }else{
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(e){
        e.preventDefault();

        // Disable the submit button to prevent repeated clicks
        document.getElementById('complete-order').disabled = true;

        var options = {
            name: document.getElementById('cardholdername').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_zip: document.getElementById('zipcode').value
        }

        stripe.createToken(card, options).then(function(result){
            if(result.error){
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
                document.getElementById('complete-order').disabled = false;
            }else{
                stripeTokenHandler(result.token);
            }
        })
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>
@endsection