<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cp\vendorController;

Route::middleware(['guest:storeVendor'])->group(function () {
    
    Route::get('/login',[vendorController::class,'loginGet'])->name('vendor.login.get');
    Route::post('/login',[vendorController::class,'loginPost'])->name('vendor.login.post');
    Route::get('/register',[vendorController::class,'registerGet'])->name('vendor.register.get');
    Route::post('/register',[vendorController::class,'registerPost'])->name('vendor.register.post');
});





Route::get('/',function(){
    return view('vendorCpanel.index');
})->name('vendor.dashboard')->middleware('auth:storeVendor');

?>