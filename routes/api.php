<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Controller;


use App\Models\productCategory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/',['uses'=>'Controller@Unauthenticated','as'=>'test']);


Route::get('/subCategories/{parentId}',function($parentId){

    //get sub categories
    $cats=productCategory::where('parent_id',$parentId)->where('category_type','sub')->get();
    return response()->json(['success'=>true,'payload'=>['categories'=>$cats]], 200,);


})->name('fetch.subCategories');
