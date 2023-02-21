<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\cp\vendor\config\saveConfigRequest;
use App\Models\storeConfig;
use DataTables;

class configController extends Controller
{
    public function index()
    {
        
        // $configs=storeConfig::all();
        $type='';
        return view('vendorCpanel.configs.list',compact('type'));

    }    

    public function new()
    {
        return view('vendorCpanel.configs.new');   
    }

    public function store(saveConfigRequest $request)
    {
        //save config
        $saveConfig=new storeConfig();
        $saveConfig->config_type=$request->configTypeI;
        $saveConfig->config_name=$request->configNameI;
        $saveConfig->config_key=$request->configKeyI;
        $saveConfig->config_value=$request->configValueI;
        $saveConfig->config_sub_value=$request->configSubValueI;
        $saveConfig->config_desc=$request->configDescI;
        $saveConfig->save();
        return  redirect()->route('config.index')->with('success', 'Config Successfully Saved');

    }

    public function byType($type)
    {
        $types=['currency','general','language'];
        if(!in_array($type, $types)){ 
            $type='all';
        }
        return view('vendorCpanel.configs.list',compact('type'));
    }


    public function datatables($type)
    {
        
        $types=['currency','general','language'];
        if(in_array($type, $types)){
            $configs=storeConfig::where('config_type',$type)->get();
        }
        else{
            $configs=storeConfig::all();
        }
        return DataTables::of($configs)->addColumn('action', function($row){
            $actionBtn='<div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">suspend</a>
                                <a class="dropdown-item" href="#">delete</a>
                            </div>
                        </div>';

            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

}
