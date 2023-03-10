<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ProductTrait;

class storeProduct extends Model
{
    use HasFactory;
    use ProductTrait;

    public  $lang='en';
    public $curr='sar';
    protected $appends=[
        'strings',
        'properties',
        'price',
        'sku',
        'vendor',
        'quantity',
        'hasSale',
        'inStock',
        'soldindividually',
        'shpinigWeight',
        'shpinigLength',
        'shipingWidth',
        'shipingHeight',
    ];
    protected $with=['category','brand','metas'];

    protected $fillable =['product_permalink','product_category','product_brand'];

    public function scopeActive($query)
    {
        return $query->where('product_status',1);
    }

    public function scopeParent($query)
    {
        return $query->whereIn('product_type',['simple','variable']);
    }

    public function scopeChild($query)
    {
        return $query->whereIn('product_type',['simple','variation']);
    }


    public function brand()
    {
        return $this->hasOne(productBrand::class,'id', 'product_brand');
    }


    public function category()
    {
        return $this->hasOne(productCategory::class, 'id', 'product_category');
    }


    public function variations()
    {
        $variations=$this->hasMany(self::class, 'parent_id','id');
        $variations=$variations->where('product_type','variation');
        return $variations;            
    }


    public function metas()
    {
        return $this->hasMany(productMeta::class, 'product_id', 'id');
    }

    public function getVendorAttribute()
    {
        return storeVendor::find($this->product_vendor,['username','email'])->makeHidden('balance');
        // return $this->where(storeVendor::class,'id', 'product_vendor');
    }

    public function getQuantityAttribute()
    {
        $meta=$this->getMeta('product_qty',$this->id)->first();
        if($meta){
            return $meta->meta_value;
        }
    }

    public function getHasSaleAttribute()
    {
        $meta=$this->getMeta('product_sale_price',$this->id)->first();
        if($meta){
            return true;
        }
        else{
            return false;
        }
    }


    
    public function getInStockAttribute()
    {
        $meta=$this->getMeta('product_stock_status',$this->id)->first();
        if($meta){
            return $meta->meta_value;
        }
    }

    public function getSoldindividuallyAttribute()
    {
        $meta=$this->getMeta('product_sold_individually',$this->id)->first();
        if($meta){
            return true;
        }
        else{
            return false;
        }
    }


    public function getShpinigWeightAttribute()
    {
        $meta=$this->getMeta('product_shipping_weight',$this->id)->first();
        // dd($this->id);
        if($meta){
            return $meta->meta_value;
        }
    }


    public function getShpinigLengthAttribute()
    {
        $meta=$this->getMeta('product_shipping_length',$this->id)->first();
        if($meta){
            return $meta->meta_value;
        }
    }

    public function getShipingWidthAttribute()
    {
        $meta=$this->getMeta('product_shipping_width',$this->id)->first();
        if($meta){
            return $meta->meta_value;
        }
    }

    public function getShipingHeightAttribute()
    {
        $meta=$this->getMeta('product_shipping_height',$this->id)->first();
        if($meta){
            return $meta->meta_value;
        }
    }

    public function getStringsAttribute()
    {
        $lang=app('request')->route('lang');
        if(app('request')->routeIs('api.*') && $lang){
            $language=$lang;
        }
        else{
            $language=$this->lang;
        }
        
        $getTranslations=translationString::where('translation_lang',$language)
            ->where('translation_parent_type','product')
            ->where('translation_parent_id',$this->id)
            ->get();
        $tranlations=[];
        foreach ($getTranslations as $translation) {
            $tranlations[$translation['translation_key']]=$translation['translation_value'];
        }
        return $tranlations;
    }

    public function getPropertiesAttribute()
    {
        if($this->product_type==='variable'){
            $propIds=$this->getMeta('property',$this->id)->pluck('meta_value');
            return productProperty::whereIn('id',$propIds)->get();
        }
        return [];
    }

    public function getPriceAttribute()
    {
        //get curr
        $currency=storeConfig::currency()->where('config_key',$this->curr)->first();

        if($this->product_type==='simple' || $this->product_type==='variation'){
            //get price meta 
            $regularPrice=$this->getMeta('product_price',$this->id)->first();
            $discountedPrice=$this->getMeta('product_sale_price',$this->id)->first();
            if($discountedPrice){
                $price=$discountedPrice;
            }
            else{
                $price=$regularPrice;
            }
            return $currency->config_value*$price->meta_value;
        }
        elseif($this->product_type==='variable') {

            //get min and max price for variable 
            $priceArr=productMeta::where('meta_key','product_price')
            ->whereIn('product_id',self:: where('product_status',1)
                                    ->where('product_type','variation')
                                    ->where('parent_id',$this->id)
                                    ->pluck('id')
            );
            return $currency->config_value*$priceArr->max('meta_value').' - '.$currency->config_value*$priceArr->min('meta_value');

        }

    }

    public function getSkuAttribute()
    {
        # code...
        $meta=$this->getMeta('product_sku',$this->id)->first();
        if($meta){
            return $meta->meta_value;
        }
    }

}
