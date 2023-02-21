<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\cp\vendor\layoutController;
use App\Http\Controllers\cp\vendor\layoutItemController;

    Route::get('/',[layoutController::class,'index'])->name('layout.index');

    Route::get('/new',[layoutController::class,'new'])->name('layout.new.get');

    Route::post('/new',[layoutController::class,'store'])->name('layout.new.post');
    
    Route::get('/datatabels/{type}',[layoutController::class,'datatables'])->name('layout.datatables');
    
    Route::prefix('/{permalink}')->group(function () {
        
        Route::get('/',[layoutController::class,'show'])->name('layout.show.get');

        Route::get('/add-item',[layoutItemController::class,'new'])->name('layout.item.add.get');

        Route::post('/add-item',[layoutItemController::class,'store'])->name('layout.item.add.post');

    });





?>