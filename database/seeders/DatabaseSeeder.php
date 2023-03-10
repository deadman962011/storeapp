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

        //save vendor role 
        \App\Models\storeVendorRole::create([
            'name'=>'vendor',
            'permissions'=>serialize(config('constants.VENDOR_ROLE')),
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

        //save arabic language
        \App\Models\StoreConfig::create([ 
            'config_type'=>'language',
            'config_name'=>'Arabic Language',
            'config_key'=>'ar',
            'config_value'=>'العربية',
            'config_sub_value'=>'ae',
            'config_desc'=>'Arabic Language'
        ]);

        //save english language
        \App\Models\StoreConfig::create([ 
            'config_type'=>'language',
            'config_name'=>'English Language',
            'config_key'=>'en',
            'config_value'=>'English',
            'config_sub_value'=>'us',
            'config_desc'=>'English Language'
        ]);


        //vendor able to withdraw config
        \App\Models\StoreConfig::create([ 
            'config_type'=>'general',
            'config_name'=>'Withdraw able to withdraw after',
            'config_key'=>'vendorAbleToWithdraw',
            'config_value'=>1,
            'config_sub_value'=>'',
            'config_desc'=>'Withdraw able to withdraw period'
        ]);

        //save category
        \App\Models\productCategory::create([ 
            'category_permalink'=>'elecetronics',
            'category_type'=>'main',
            'category_status'=>1,
            'parent_id'=>null,
        ]);

        //save brand

        //save main page 
        \App\Models\storeLayout::create([ 
            'layout_name'=>'main page',
            'layout_permalink'=>'main-page',
            'layout_desc'=>'main page layout'
        ]);

        //save product one  page 
        \App\Models\storeLayout::create([ 
            'layout_name'=>'product one page',
            'layout_permalink'=>'product-one-page',
            'layout_desc'=>'product one layout'
        ]);
        // productOne

    }
}
