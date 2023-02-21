<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\userController;


Route::prefix('user')->group(function () {  

    Route::get('/',[userController::class,'getUser'])->middleware('auth:api');

    Route::post('/',[userController::class,'updateUser'])->middleware('auth:api');
    
    Route::get('/google/req',[userController::class,'authenticateUserGoogleReq']);

    Route::get('/google/exec',[userController::class,'authenticateUserGoogleExec']);
    
    // Route::get('/facebook/req',[userController::class,'authenticateUserFacebookReq']);

    // Route::get('/facebook/exec',[userController::class,'authenticateUserFacebookExec']);
});


?>
