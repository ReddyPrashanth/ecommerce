<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\GuestCheckoutRequest;

class GuestCheckoutController extends Controller
{
    
    public function index(){

        if(auth()->user()){
            return redirect()->route('checkout.index');
        }
        $key = config('services.stripe.key');
        return view('checkout')->with([
            'key' => $key,
            'subTotal' => Cart::subtotal(),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'newSubTotal' => getNumbers()->get('newSubTotal')
        ]); 
    }

    public function email(GuestCheckoutRequest $request){
        return redirect()->route('guestCheckout.index');
    }
}
