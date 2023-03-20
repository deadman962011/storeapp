<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\GeneralTrait;

class DatabaseSeeder extends Seeder
{
    use GeneralTrait;
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
            'config_desc'=>'sar currency',
            'config_input'=>'number'
        ]);

        //save arabic language
        \App\Models\StoreConfig::create([ 
            'config_type'=>'language',
            'config_name'=>'Arabic Language',
            'config_key'=>'ar',
            'config_value'=>'العربية',
            'config_sub_value'=>'ae',
            'config_desc'=>'Arabic Language',
            'config_input'=>'switch'
        ]);

        //save english language
        \App\Models\StoreConfig::create([ 
            'config_type'=>'language',
            'config_name'=>'English Language',
            'config_key'=>'en',
            'config_value'=>'English',
            'config_sub_value'=>'us',
            'config_desc'=>'English Language',
            'config_input'=>'switch'
        ]);


        //vendor able to withdraw config
        \App\Models\StoreConfig::create([ 
            'config_type'=>'general',
            'config_name'=>'Withdraw able to withdraw after',
            'config_key'=>'vendorAbleToWithdraw',
            'config_value'=>1,
            'config_sub_value'=>'',
            'config_desc'=>'Withdraw able to withdraw period',
            'config_input'=>'number'
        ]);

        //default language config
        \App\Models\StoreConfig::create([ 
            'config_type'=>'general',
            'config_name'=>'Default Language',
            'config_key'=>'defaultLanguage',
            'config_value'=>'en',
            'config_sub_value'=>'',
            'config_desc'=>'Application Default Language',
            'config_input'=>'switch'
        ]);



        //save category
        \App\Models\productCategory::create([ 
            'category_permalink'=>'elecetronics',
            'category_type'=>'main',
            'category_status'=>1,
            'parent_id'=>null,
        ]);
        $catTransEnArr=[
            [
                'key'=>'category_name',
                'value'=>'elecetronics',
            ],
            [
                'key'=>'category_desc',
                'value'=>'elecetronics descr',
            ],
        ];
        $catTransArArr=[
            [
                'key'=>'category_name',
                'value'=>'الكترونيات',
            ],
            [
                'key'=>'category_desc',
                'value'=>'شرح الكترونيات',
            ],
        ];
        $this->saveTranslateMany($catTransArArr,'category','ar',1);
        $this->saveTranslateMany($catTransEnArr,'category','en',1);

        //save brand
        \App\Models\productBrand::create([ 
            'brand_permalink'=>'apple',
            'brand_status'=>1,
        ]);

        $brandTransArArr=[
            [
                'key'=>'brand_name',
                'value'=>'ابل',
            ],
            [
                'key'=>'brand_desc',
                'value'=>'شرح ابل',
            ],
        ];
        $brandTransEnArr=[
            [
                'key'=>'brand_name',
                'value'=>'apple',
            ],
            [
                'key'=>'brand_desc',
                'value'=>'apple desc',
            ],
        ];

        $this->saveTranslateMany($brandTransArArr,'brand','ar',1);
        $this->saveTranslateMany($brandTransEnArr,'brand','en',1);


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
        
        // save category one page 
        \App\Models\storeLayout::create([ 
            'layout_name'=>'category one page',
            'layout_permalink'=>'category-one-page',
            'layout_desc'=>'category one layout'
        ]);
    }
}
