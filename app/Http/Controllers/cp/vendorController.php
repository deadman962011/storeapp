<?php

namespace App\Http\Controllers\cp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\cp\vendor\vendorLoginRequest;
use App\Http\Requests\cp\vendor\vendorRegisterRequest;

use App\Models\storeVendor;

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
        // id
        // email
        // username
        // password
        // remember_token
        // role_id
        
        $saveVendor=new storeVendor();
        $saveVendor->username=$request->fullNameI;
        $saveVendor->email=$request->emailI;
        $saveVendor->role_id=2;
        $saveVendor->password=bcrypt($request->passwordI);
        $saveVendor->save();

        if(Auth::guard('storeVendor')->login($saveVendor)){
            return  redirect()->route('vendor.dashboard')->with('success', 'Vendor Successfully Registerd');
        }
         

        //save vendor 
        return 'save new vendor';


    }


}
