<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cp\vendor\brandController;


Route::get('/',[brandController::class,'index'])->name('brand.index');


Route::get('/new',[brandController::class,'new'])->name('brand.new.get');

Route::post('/new',[brandController::class,'store'])->name('brand.new.post');

Route::get('/{brandId}/{lang}/edit',[brandController::class,'edit'])->name('brand.edit.get');

Route::post('/{brandId}/{lang}/edit',[brandController::class,'update'])->name('brand.edit.post');


?>