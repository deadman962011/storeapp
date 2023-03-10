<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cp\vendor\categoryController;

Route::get('/',[categoryController::class,'index'])->name('category.index');

Route::get('/new',[categoryController::class,'new'])->name('category.new.get');

Route::post('/new',[categoryController::class,'store'])->name('category.new.post');

Route::get('/{type}',[categoryController::class,'byType'])->name('category.byType.get');

Route::get('/datatabels/{type}',[categoryController::class,'datatables'])->name('category.datatables');

Route::get('/{categoryId}/{lang}/edit',[categoryController::class,'edit'])->name('category.edit.get');

Route::post('/{categoryId}/{lang}/edit',[categoryController::class,'update'])->name('category.edit.post');

// Route::get('/{lang}',[categoryController::class,'test']);


?>