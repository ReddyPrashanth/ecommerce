<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;

class CheckoutController extends Controller
{
    public function index(){
        $key = config('services.stripe.key');
        return view('checkout')->with([
            'key' => $key,
            'subTotal' => Cart::subtotal(),
            'newTax' => getNumbers()->get('newTax'),
            'newTotal' => getNumbers()->get('newTotal'),
            'newSubTotal' => getNumbers()->get('newSubTotal')
        ]);
    }

    public function chargeWithStripe(CheckoutRequest $request){
        if(Cart::instance('default')->count() == 0 ){
            return back()->withErrors('Your cart is empty! Please add items before checkout.');
        }
        $contents = Cart::content()->map(function ($item) {
            return $item->model->slug.', '.$item->qty;
        })->values()->toJson();

        try{
            $charge = Stripe::charges()->create([
                'amount' => getNumbers()->get('newTotal'),
                'currency' => 'USD',
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count()
                ],
            ]);
            Cart::instance('default')->destroy();
            return redirect()->route('confirmation.index')->with('success_message', 'Thank You! Your payment has been successful.');
        }catch(CardErrorException $e){
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }
}
