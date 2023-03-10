<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\userController;


Route::get('/',[userController::class,'getUser'])->middleware('auth:api');

Route::post('/',[userController::class,'updateUser'])->middleware('auth:api');

Route::post('/register',[userController::class,'register'])->middleware('guest:api');

Route::post('/mobile/check',[userController::class,'mobileCheck'])->middleware('guest:api');

Route::post('/mobile/login',[userController::class,'mobileLogin'])->middleware('guest:api');

Route::post('/email/check',[userController::class,'emailCheck'])->middleware('guest:api');

Route::post('/email/login',[userController::class,'emailLogin'])->middleware('guest:api');

Route::get('/google/req',[userController::class,'authenticateUserGoogleReq']);

Route::get('/google/exec',[userController::class,'authenticateUserGoogleExec']);
    
    // Route::get('/facebook/req',[userController::class,'authenticateUserFacebookReq']);

    // Route::get('/facebook/exec',[userController::class,'authenticateUserFacebookExec']);



?>
