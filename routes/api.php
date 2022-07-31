<?php

use App\Http\Controllers\ApiControllers\ApiBookinOrderController;
use App\Http\Controllers\ApiControllers\ApiCountryController;
use App\Http\Controllers\ApiControllers\ApiHotelController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'],function (){
    Route::resource('/countries', ApiCountryController::class);
    Route::resource('/hotels', ApiHotelController::class);
    Route::resource('/bookings', ApiBookinOrderController::class);
   
    

});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
