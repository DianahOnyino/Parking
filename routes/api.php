<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Parking Routes
Route::get('/all-available-parking-spots', 'ParkingController@getAllAvailableParkingSpots')
    ->name('available-parking-spots');

Route::get('/next-available-parking-spot/{vehicle_type}', 'ParkingController@getNextAvailableParkingSpot')
     ->name('next-available-parking-spot');

Route::get('/available-parking-spot-with-lowest-number', 'ParkingController@getAvailableParkingSpotWithLowestNumber')
     ->name('available-parking-spot-with-lowest-number');

Route::get('/park/{parkingLotStartNo}', 'ParkingController@park')
     ->name('park');

Route::get('/unpark/{parking_number}', 'ParkingController@unpark')->name('unpark');

//Stock tracking routes
Route::get('/sell-item/{item_id}/{supermarket_id}/{quantity}', 'StockTrackingController@sellItem')->name('sell-item');

Route::get('/sell-item/{item_id}/{supermarket_id}/{quantity}', 'StockTrackingController@sellItem')->name('sell-item');

//Route::get('/sell-item/{item_id}/{supermarket_id}/{quantity}', 'StockTrackingController@sellItem')->name('sell-item');