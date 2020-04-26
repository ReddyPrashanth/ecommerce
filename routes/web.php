<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');
Route::get('/home', 'HomeController@home')->name('ecommerce.home');
Route::get('/shop', 'ProductController@index')->name('shop.index');
Route::get('/shop/{slug}', 'ProductController@show')->name('shop.show');
Route::post('/shopping/cart', 'CartController@store')->name('shop.store');
Route::get('/shopping/cart', 'CartController@index')->name('shop.cart');
Route::delete('/cart/destroy/{product}', 'CartController@destroy')->name('cart.destroy');
Route::delete('/cart/saveForLater/{product}', 'CartController@saveForLater')->name('cart.saveForLater');
Route::patch('/cart/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/switchToCart/{productid}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

// Coupon Routes

Route::post('/coupon/apply', 'CouponsController@applyCoupon')->name('coupon.apply');
Route::delete('/coupon/destroy', 'CouponsController@destroy')->name('coupon.destroy');

// Checkout Routes
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout/charge', 'CheckoutController@chargeWithStripe')->name('stripe.charge');

Route::get('/confirmation', 'ConfirmationController@index')->name('confirmation.index');