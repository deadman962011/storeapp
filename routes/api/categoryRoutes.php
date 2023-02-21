<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\categoryController;

    // Route::get('/',[userController::class,'getUser'])->middleware('auth:api');
    Route::get('/',[categoryController::class,'all'])->name('api.category.all');


?>