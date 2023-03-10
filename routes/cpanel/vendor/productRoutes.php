<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cp\vendor\productController;


Route::get('/',[productController::class,'index'])->name('product.index');

Route::get('/new',[productController::class,'new'])->name('product.new.get');

Route::post('/new',[productController::class,'store'])->name('product.new.post');

Route::get('/{status}/{type}',[productController::class,'byCondition'])->name('product.byCondintion.get');

Route::get('/datatabels/{type}/{status}',[productController::class,'datatables'])->name('product.datatables');

Route::get('/{productId}/{lang}/edit',[productController::class,'edit'])->name('product.edit.get');

Route::post('/{productId}/{lang}/edit',[productController::class,'update'])->name('product.edit.post');



?>