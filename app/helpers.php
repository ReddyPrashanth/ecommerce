<?php

function presentPrice($price)
{
    return '$'.$price;
}

function getNumbers(){
    $tax = config('cart.tax');
    $discount = session()->get('coupon')['discount'] ?? 0;
    $newSubTotal = Cart::subtotal() - $discount;
    if($newSubTotal < 0 ){
        $newSubTotal = 0;
    }
    $newTax = ($newSubTotal * $tax)/100;
    $newTotal = $newSubTotal + $newTax;
    return collect([
        'newSubTotal' => round($newSubTotal, 2),
        'newTax' => round($newTax, 2),
        'newTotal' => round($newTotal,2),
        'tax' => $tax
    ]);
}