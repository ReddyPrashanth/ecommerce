<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index(){
        $mightAlsoLike = Product::mightAlsoLike()->get();
        return view('shop.cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'newSubTotal' => Cart::subtotal(),
            'newTax' => Cart::tax(),
            'newTotal' => Cart::total(),
            'tax' => getNumbers()->get('tax')
        ]);
    }

    public function store(Request $request){
        $duplicates = Cart::instance('default')->search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('shop.cart')->with('success_message', 'Item is already in the cart!');
        }

        Cart::instance('default')->add($request->id, $request->name, 1, $request->price)
            ->associate('App\Product');
        return redirect()->route('shop.cart')->with('success_message', 'Item was added to your cart!');
        
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5' 
        ]);

        if($validator->fails()){
            session()->flash('errors', collect(['Quantity must be between 1 and 5']));
            return response()->json(['success'=> false], 400);
        }

        Cart::update($id, $request->quantity);

        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json([
            'success' => true
        ], 200);
    }

    public function destroy($id){
        Cart::instance('default')->remove($id);
        return back()->with('success_message', 'Item was removed from your cart!');
    }

    public function saveForLater($id){
        $item = Cart::instance('default')->get($id);
        Cart::instance('default')->remove($id);
        $duplicates = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });
        if($duplicates->isNotEmpty()){
            return redirect()->route('shop.cart')->with('success_message', 'Item is already saved for later!');
        }
        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Product');
        return redirect()->route('shop.cart')->with('success_message', 'Item has been saved for later!');
    }
}
