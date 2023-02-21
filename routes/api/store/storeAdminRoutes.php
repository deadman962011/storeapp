<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\store\storeAdminController;



    Route::post('/login',[storeAdminController::class,'login'])->middleware('guest:storeAdmin');

    Route::post('/register',[storeAdminController::class,'register'])->middleware('guest:storeAdmin');




?>