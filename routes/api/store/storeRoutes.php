<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\store\storeController;

    Route::resource('/', StoreController::class)->middleware('auth:storeAdmin');


?>