<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cp\vendor\configController;

Route::get('/',[configController::class,'index'])->name('config.index');

Route::get('/new',[configController::class,'new'])->name('config.new.get');

Route::post('/new',[configController::class,'store'])->name('config.new.post');

Route::get('/{type}',[configController::class,'byType'])->name('config.byType.get');

Route::get('/datatabels/{type}',[configController::class,'datatables'])->name('config.datatables');

?>