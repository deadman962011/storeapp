<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\brandController;

Route::get('/',[brandController::class,'all'])->name('api.brand.all');



?>