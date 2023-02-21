<?php

namespace App\Http\Controllers\cp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\cp\vendor\vendorLoginRequest;
use App\Http\Requests\cp\vendor\vendorRegisterRequest;

use Auth;

class vendorController extends Controller
{
    //


    public function loginGet()
    {
        
        return view('vendorCpanel.login');

        
    }
    // 

    public function loginPost(vendorLoginRequest $request)
    {

        
        if(Auth::guard('storeVendor')->attempt(['email'=>$request->emailI,'password'=>$request->passwordI])){
            return  redirect()->route('vendor.dashboard')->with('success', 'Vendor Successfully Logged-in');
        }
        else{
            return  redirect()->back()->with('danger', 'Creds not match');
        }
        

    }

    public function registerGet()
    {
        
        return view('vendorCpanel.register');

        
    }

    public function registerPost(vendorRegisterRequest $request)
    {
        # code...

        //save vendor 
        return 'save new vendor';


    }


}
