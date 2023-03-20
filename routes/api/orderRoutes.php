<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\orderController;
use App\Http\Controllers\api\paypalController;
use App\Http\Controllers\api\cashOnDeleveryController;



Route::get('/',[orderController::class,'all']);

Route::get('/{id}',[orderController::class,'get']);

Route::post('/paypal/request',[paypalController::class,'request']);

Route::get('/paypal/callback',[paypalController::class,'callback']);

Route::get('/paypal/cancel',[paypalController::class,'cancel']);

Route::post('/cashOnDelevery/request',[cashOnDeleveryController::class,'request']);


// Route::post('/stripe/request');

// Route::post('/{method}/request');

// Route::post('/{method}/callback');

?>