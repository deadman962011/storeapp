<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\storeLayout;
use App\Models\storeSlider;
use App\Models\layoutItem;
use App\Http\Requests\cp\vendor\layoutItem\saveLayoutItemRequest;

class layoutItemController extends Controller
{
    //


    public function new($permalink)
    {
        $layout=storeLayout::where('layout_permalink',$permalink)->first();
        $sliders=storeSlider::active()->get();
        if(!$layout){
            return  redirect()->route('layout.index')->with('danger', 'Unable to find Layout');
        }

        return view('vendorCpanel.layoutItems.new',compact(['layout','sliders']));
    }



    public function store(saveLayoutItemRequest $request,$permalink)
    {
        // return $request->all();
        $sort=layoutItem::where('item_breakpoint',$request->layoutItemBreakpointI)->where('layout_id',$request->layoutIdI)->count();
        $saveLayoutItem=new layoutItem();
        $saveLayoutItem->item_type=$request->layoutItemTypeI;
        $saveLayoutItem->item_status=1;
        $saveLayoutItem->item_breakpoint=$request->layoutItemBreakpointI;
        $saveLayoutItem->item_items_count=$request->productCountI;
        $saveLayoutItem->item_sort=$sort+1;
        if($request->layoutItemTypeI==='list'){
            $saveLayoutItem->attachment_type=$request->layoutItemTaxonomyI;
            $saveLayoutItem->attachment_id=$request->layoutItemTaxonomyIdI;
        }
        elseif($request->layoutItemTypeI==='slider'){
            $saveLayoutItem->attachment_type='slider';
            $saveLayoutItem->attachment_id=$request->layoutItemSliderIdI;
        }
        $saveLayoutItem->layout_id=$request->layoutIdI;
        $saveLayoutItem->save();

        return  redirect()->route('layout.show.get',['permalink'=>$permalink])->with('success', 'Layout item successfully saved');

    }



}
