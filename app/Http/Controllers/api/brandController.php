<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\productBrand;


class brandController extends Controller
{
    //
    public function all()
    {
        $brands=productBrand::active()->get();
        return response()->json(['success'=>true,'payload'=>$brands,'message'=>'brands successfully loaded'], 200);
    }

}
