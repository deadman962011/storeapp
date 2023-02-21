<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\productCategory;


class categoryController extends Controller
{
    //

    public function all()
    {
        $categories=productCategory::active()->get();
        return response()->json(['success'=>true,'payload'=>$categories,'message'=>'categories successfully loaded'], 200);
    }

}
