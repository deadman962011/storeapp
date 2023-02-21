<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\layoutController;


Route::get('/{permalink}',[layoutController::class,'show'])->name('api.layout.show');

