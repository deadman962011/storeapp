<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cp\vendor\propertyController;
use App\Http\Controllers\cp\vendor\propertyChildController;

Route::get('/',[propertyController::class,'index'])->name('property.index');

Route::get('/new',[propertyController::class,'new'])->name('property.new.get');

Route::post('/new',[propertyController::class,'store'])->name('property.new.post');

Route::get('/{id}/add-child',[propertyController::class,'childNew'])->name('property.add-child.get');

Route::post('/{id}/add-child',[propertyController::class,'store'])->name('property.add-child.post');

?>