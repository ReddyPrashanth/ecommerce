<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CouponsController extends Controller
{
    public function applyCoupon(Request $request){
        $code  = $request->coupon_code;
        $coupon = Coupon::findByCode($code);
        if(!$coupon){
            return back()->withErrors('Invalid Coupon Code. Please try again');
        }

        dispatch_now(new UpdateCoupon($coupon));
        return back()->with('success_message', 'Coupon applied successfully!');
    }

    public function destroy(){
        session()->forget('coupon');

        return back()->with('success_message', 'Coupon was removed!');
    }
}
