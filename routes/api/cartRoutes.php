<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\cartController;


Route::get('/init',[cartController::class,'init']);
Route::get('/get/{id}',[cartController::class,'get']);
Route::post('/add/{id}',[cartController::class,'add']);
Route::post('/remove/{id}',[cartController::class,'remove']);
Route::post('/increase/{id}',[cartController::class,'increase']);
Route::post('/reduce/{id}',[cartController::class,'reduce']);



?>