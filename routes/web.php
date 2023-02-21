<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // return $image = base64_encode(file_get_contents($request->file('image')->pat‌​h()));
    return response()->json([
        'success'=>false,
        'playload'=>null,
        'message'=>'unauthenticated'
    ]);
    // return view('welcome');
})->name('login');

Route::get('cpanel',function(){
    return view('cpanel.index' );

});


//Route::get('/cp/reports',)
