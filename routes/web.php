<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;

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

/* LANDING */

Route::middleware('verified')->group(function(){

    Route::get('/commander','CheckoutController@index')->name('checkout.index')->middleware('auth');

    Route::get('/compte', 'HomeController@edit')->name('users.edit');
    Route::post('/compte', 'HomeController@update')->name('users.update');

    Route::get('/commandes', 'OrdersController@index')->name('orders.index');
    Route::get('/commandes/{order}', 'OrdersController@show')->name('orders.show');


});



Route::get('/','WelcomeController@index')->name('welcome');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');


/* STUDIO */ 

Route::get('/studio','StudioController@index')->name('studio.index');
Route::get('/studio/printer','StudioController@print')->name('studio.print');
Route::get('/studio/formats','StudioController@format')->name('studio.format');


/* SHOOTING */

Route::get('/shooting','ShootingController@index')->name('shooting.index');
  Route::get('/shooting/reservation','ShootingController@reservation')->name('shooting.reservation');
  Route::post('/shooting/reservation','ShootingController@store')->name('shooting.store');



/* GIFT CADEAU */

Route::get('/cadeaux','CadeauxController@index')->name('cadeaux.index');
Route::get('/cadeaux/{slug}','CadeauxController@show')->name('cadeaux.show');


/* MARIAGE */
Route::get('/mariage','MariageController@index')->name('mariage.index');
Route::get('/mariage/reservation','MariageController@reservation')->name('mariage.reservation');
Route::post('/mariage','MariageController@store')->name('mariage.store');



/* Event */
Route::get('/event','EventController@index')->name('event.index');
Route::get('/event/reservation','EventController@reservation')->name('event.reservation');
Route::post('/event','EventController@store')->name('event.store');


/* Labo */
Route::get('/labonassro','LaboController@index')->name('labo.index');

/* Gallery */
Route::get('/gallery','GalleryController@index')->name('gallery.index');


/* Contact */
Route::get('/contact','ContactController@index')->name('contact.index');
Route::post('/contact','ContactController@store')->name('contact.store');



/* Cart */

Route::get('/panier','CartController@index')->name('cart.index');
Route::post('/panier','CartController@store')->name('cart.store');
Route::delete('/panier{rowId}','CartController@destroy')->name('cart.destroy');


/* Checkout */
Route::post('/commander','CheckoutController@store')->name('checkout.store');
Route::post('/region/{regionId}','CheckoutController@getRegion')->name('checkout.region');

Route::get('/inviter','CheckoutController@index')->name('inviter.index');


/* Thnakyou */

Route::get('/merci','ConfirmationController@index')->name('thankyou.index');


/* Personalisation  Cadeaux ela 9ed l7aaal  */

Route::get('/personaliser/{slug}','PersonalizerController@index')->name('personaliser.index');
Route::delete('/personaliser/{rowId}','PersonalizerController@destroy')->name('personaliser.destroy');


/* Coupons */

Route::post('/coupon','CouponsController@store')->name('coupon.store');
Route::delete('/coupon','CouponsController@destroy')->name('coupon.destroy');





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
