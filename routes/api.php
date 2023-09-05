<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
   // Followers
   Route::get('followers', 'FollowerController@index');
   Route::post('followers', 'FollowerController@store');
   Route::get('followers/{follower}', 'FollowerController@show');
   Route::put('followers/{follower}', 'FollowerController@update');
   Route::delete('followers/{follower}', 'FollowerController@destroy');

   // Subscribers
   Route::get('subscribers', 'SubscriberController@index');
   Route::post('subscribers', 'SubscriberController@store');
   Route::get('subscribers/{subscriber}', 'SubscriberController@show');
   Route::put('subscribers/{subscriber}', 'SubscriberController@update');
   Route::delete('subscribers/{subscriber}', 'SubscriberController@destroy');

   // Donations
   Route::get('donations', 'DonationController@index');
   Route::post('donations', 'DonationController@store');
   Route::get('donations/{donation}', 'DonationController@show');
   Route::put('donations/{donation}', 'DonationController@update');
   Route::delete('donations/{donation}', 'DonationController@destroy');

   // Merch Sales
   Route::get('merch-sales', 'MerchSaleController@index');
   Route::post('merch-sales', 'MerchSaleController@store');
   Route::get('merch-sales/{merch_sale}', 'MerchSaleController@show');
   Route::put('merch-sales/{merch_sale}', 'MerchSaleController@update');
   Route::delete('merch-sales/{merch_sale}', 'MerchSaleController@destroy');

   Route::post('register', 'UserController@register');
   Route::post('login', 'UserController@login');


   Route::post('notifications', 'NotificationController@sendNotification');
Route::put('notifications/mark-as-read/{id}', 'NotificationController@markAsRead');
Route::put('notifications/mark-as-unread/{id}', 'NotificationController@markAsUnread');
Route::get('notifications', 'NotificationController@getUserNotifications');

   Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
   });
