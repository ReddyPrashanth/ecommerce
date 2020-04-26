<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        $products = Product::inRandomOrder()->take(8)->get();
        return view('home')->with('products', $products);
    }
}
