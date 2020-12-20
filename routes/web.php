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

Route::get('/home', function () {
    return redirect('/');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/my-account', 'HomeController@myaccount')->name('myaccount');
Route::post('/my-account/update', 'HomeController@myaccountupdate')->name('myaccountupdate');
Route::post('/review', 'ProductFeedbackController@store')->name('store_review');
Route::get('/orders', 'OrderController@listorders')->name('listorders');
Route::get('/orders/{id}', 'OrderController@show')->name('showorder');
Route::get('/cart', 'OrderController@index')->name('cart');
Route::get('/cart-remove', 'OrderController@destroy')->name('cart_remove');
Route::post('/cart', 'OrderController@store')->name('cart_save');
Route::post('/applycoupon', 'OrderController@coupon')->name('coupon_apply');
Route::post('/cart/placeorder', 'OrderController@placeorder')->name('place_order');
Route::get('/offers', 'HomeController@advertisementlist')->name('adv_list');
Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/customers/unapproved', 'Admin\CustomerController@unapproved')->name('customers.unapproved');
    Route::resource('customers', 'Admin\CustomerController');
    Route::resource('tyresizes', 'Admin\TyreSizeController');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('offers', 'Admin\OfferController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('feedbacks', 'Admin\FeedbackController');
    Route::resource('advertisements', 'Admin\AdvertisementController');
});
