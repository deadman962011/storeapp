<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productCategory;
use App\Models\productBrand;
use App\Models\productProperty;
use App\Models\product;
use DataTables;

use App\Http\Requests\cp\vendor\product\saveProductRequest;

use Auth;
use App\Traits\ProductTrait;
use App\Traits\GeneralTrait;


class productController extends Controller
{
    use ProductTrait;
    use GeneralTrait;
    //

    public function index(){

        //get products

        //get products 
        // $products=product::active()->parent()->get();
        // dd($products->toArray());
        $status='1';
        $type='all';
        return view('vendorCpanel.products.list',compact('status','type'));
    
    }

    public function new()
    {

        //get categories 
        
        $categories=productCategory::where('category_status',1)->orderByRaw("FIELD(category_type , 'main', 'sub', 'child') ASC")->get();
        $brands=productBrand::where('brand_status',1)->get();
        $properties=productProperty::where('property_type','parent')->get();
        return view('vendorCpanel.products.new',compact(['categories','brands','properties']));
    }


    public function store(saveProductRequest $request)
    {
        // dd($request->productSoldindividuallyI);
        //get vendorId
        $vendor=Auth::guard('storeVendor')->user();

        //save product 
        //product_permalink	product_type	product_status	parent_id	
        //product_category	product_brand	product_vendor	created_at	updated_at
        $saveproduct=new product();
        $saveproduct->product_permalink=$request->productPermalinkI;
        $saveproduct->product_status=1;
        $saveproduct->product_type=$request->productTypeI;
        $saveproduct->product_category=$request->productCatI;
        $saveproduct->product_brand=$request->productBrandI;
        $saveproduct->product_vendor=$vendor->id;
        $saveproduct->save();
         
        //save metas
        $transArr=[
            [
                'key'=>'product_name',
                'value'=>$request->productNameI,
            ],
            [
                'key'=>'product_short_desc',
                'value'=>$request->productShortDescI,
            ],
        ];

        //save translations
        $this->saveTranslateMany($transArr,'product',$saveproduct['id']);


        //check type of the product 
        $productType=$request->productTypeI;
        if($productType==='simple'){           
            $this->saveMeta('product_price',$request->productPriceI,$saveproduct['id']);
            $this->saveMeta('product_sku',$request->productSkuI,$saveproduct['id']);
            $this->saveMeta('product_qty',$request->productQtyI,$saveproduct['id']);
            $this->saveMeta('product_stock_status',$request->productInStockI,$saveproduct['id']);
            if($request->productSalePriceI){
                $this->saveMeta('product_sale_price',$request->productSalePriceI,$saveproduct['id']);
            }
            if($request->productShippingWeightI){
                $this->saveMeta('product_shipping_weight',$request->productShippingWeightI,$saveproduct['id']);
            }
            if($request->productShippingLengthI){
                $this->saveMeta('product_shipping_length',$request->productShippingLengthI,$saveproduct['id']);
            }
            if($request->productShippingWidthI){
                $this->saveMeta('product_shipping_width',$request->productShippingWidthI,$saveproduct['id']);
            }
            if($request->productShippingHeightI){
                $this->saveMeta('product_shipping_height',$request->productShippingHeightI,$saveproduct['id']);
            }
            if($request->productSoldindividuallyI){
                $this->saveMeta('product_sold_individually',$request->productSoldindividuallyI,$saveproduct['id']);
            }

        }
        elseif($productType==='variable'){

            //get properties 
            $properties=productProperty::whereIn('id',$request->productPropsI)->get();
            if(count($properties) > 0){
                $propValues=[];
                //generate product variations
                foreach ($properties as  $prop) {
                    
                    //save properties metas 
                    $this->saveMeta('property',$prop->id,$saveproduct->id);

                    $valuesArr=[];
                    if(count($prop->childs) > 0){
                        foreach ($prop->childs as  $child) { 
                            array_push($valuesArr,$child->property_value);
                        }
                        array_push($propValues,$valuesArr);
                    }
                    else{
                        //eror no valid prop childs
                    }
                }
                //combine multi dimensional array 
                $combinations= $this->combinations($propValues);

                //save variations 
                $variations=array();
                foreach ($combinations as $combination ) {
                    $var['parent_id']=$saveproduct->id;
                    $var['product_permalink']=$request->productPermalinkI.'('.implode(',',$combination).')';
                    $var['product_status']=0; //save variations as disabled because hey need some extra data 
                    $var['product_type']='variation';
                    $var['product_category']=$request->productCatI;
                    $var['product_brand']=$request->productBrandI;
                    $var['product_vendor']=$vendor->id;
                    array_push($variations,$var);
                }
                $saveVariations=product::insert($variations);

                return  redirect()->route('product.index')->with('success', 'Product Successfully Saved');
            }
            else{

                //eror no valid props
            }

        }
        else{
            return  redirect()->route('product.index')->with('danger', 'Product type  is not valid');
        }
        
        return  redirect()->route('product.index')->with('success', 'Product Successfully Saved');
    }


    public function byCondition($status,$type)
    {
        # code...
        return view('vendorCpanel.products.list',compact('status','type'));
    }




    public function datatables($type, $status)
    {
        $products=product::where('product_status',$status);
        if($type==='all'){
            $products=product::parent();
        }
        else{
            $products=product::where('product_type',$type);
        }
        $products->get();

        // return $status;
        return DataTables::of($products)
        ->addColumn('languages',function($row){
            return 'en   ar ';
        })
        ->addColumn('action', function($row){
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


