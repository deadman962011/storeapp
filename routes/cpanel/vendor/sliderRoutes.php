<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cp\vendor\sliderController;

Route::get('/',[sliderController::class,'index'])->name('slider.index');

Route::get('/new',[sliderController::class,'new'])->name('slider.new.get');

Route::post('/new',[sliderController::class,'store'])->name('slider.new.post');

Route::get('/{id}',[sliderController::class,'show'])->name('slider.show');

Route::get('/{id}/add-slide',[sliderController::class,'slideNew'])->name('slide.new.get');

Route::post('/{id}/add-slide',[sliderController::class,'slideStore'])->name('slide.new.post');

Route::get('/{id}/{slideId}/{lang}/edit',[sliderController::class,'slideEdit'])->name('slide.edit.get');

Route::post('/{id}/{slideId}/{lang}/edit',[sliderController::class,'slideUpdate'])->name('slide.edit.post');


?>