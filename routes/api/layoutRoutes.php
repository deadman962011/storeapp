<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\layoutController;

Route::get('/productOne/{productId}',[layoutController::class,'productOne']);

Route::get('/categoryOne/{categoryId}',[layoutController::class,'categoryOne']);

Route::get('/{permalink}',[layoutController::class,'show'])->name('api.layout.show');

