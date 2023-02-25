<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //save vendor super vendor role 
        \App\Models\storeVendorRole::create([
            'name'=>'super',
            'permissions'=>serialize(config('constants.SUPER_VENDOR_ROLE')),
        ]);

        //save super vendor
        \App\Models\StoreVendor::create([ 
            'email'=>'blaxk@blaxk.cc',
            'username'=>'blaxk',
            'password'=>bcrypt('a5522122'),
            'role_id'=>1
        ]);

        //save sar currency	
        \App\Models\StoreConfig::create([ 
            'config_type'=>'currency',
            'config_name'=>'sar currency',
            'config_key'=>'sar',
            'config_value'=>0.27,
            'config_sub_value'=>'sa',
            'config_desc'=>'sar currency'
        ]);

        //save main page 
        \App\Models\storeLayout::create([ 
            'layout_name'=>'main page',
            'layout_permalink'=>'main-page',
            'layout_desc'=>'main page layout'
        ]);

    }
}
