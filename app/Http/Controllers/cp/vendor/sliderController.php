<?php

namespace App\Http\Controllers\cp\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\cp\vendor\slider\saveSliderRequest;
use App\Http\Requests\cp\vendor\slider\slide\saveSlideRequest;

use App\Models\storeSlider;
use App\Models\sliderItem;
use App\Traits\GeneralTrait;
class sliderController extends Controller
{
    //
    use GeneralTrait;

    public function index()
    {
        
        $sliders=storeSlider::all();
        return view('vendorCpanel.sliders.list',compact('sliders'));
        
    }

    public function new()
    {
        return view('vendorCpanel.sliders.new'); 
    }

    public function store(saveSliderRequest $request)
    {

        // return $request->all();

        //save slider
        $saveSlider=new storeSlider();
        $saveSlider->slider_name=$request->sliderNameI;
        $saveSlider->slider_desc=$request->sliderDescI;
        $saveSlider->slider_status=1;
        $saveSlider->save();
        return  redirect()->route('slider.index')->with('success', 'Slider Successfully Saved');

    }


    public function show($id)
    {
        //get slider
        $slider=storeSlider::find($id);
        if(!$slider){
            return  redirect()->route('slider.index')->with('danger', 'Unable to find slider');
        }
        return view('vendorCpanel.sliders.show',compact('slider'));
    }

    public function slideNew($id)
    {
        //get slider
        $slider=storeSlider::find($id);
        if(!$slider){
            return  redirect()->route('slider.index')->with('danger', 'Unable to find slider');
        }
        return view('vendorCpanel.sliders.newSlide',compact('slider'));   
    }

    public function slideStore(saveSlideRequest $request,$id)
    {

        //save slide

        //get sort
        $sort=sliderItem::where('slider_id',$id)->count();

        //slide_action	slide_value	slide_status	slide_sort	slide_btn_position
        $saveSlide=new sliderItem();
        $saveSlide->slide_action=$request->slideActionI;
        $saveSlide->slide_value=$request->slideActionValueI;
        $saveSlide->slide_sort=$sort+1;
        $saveSlide->slide_status=1;
        $saveSlide->slide_btn_position=$request->slideBtnPositionI;
        $saveSlide->slider_id=$id;
        $saveSlide->save();

        //save translations
        $transArr=[
            [
                'key'=>'slide_name',
                'value'=>$request->sliderTitleI,
            ],
            [
                'key'=>'slide_desc',
                'value'=>$request->sliderTextI,
            ],
        ];
        $this->saveTranslateMany($transArr,'slide',$saveSlide['id']);

        return  redirect()->route('slider.show',['id'=>$id])->with('success', 'Slide successfully saved');
        // return $request->all();
    }

    public function slideEdit($id,$slideId,$lang)
    {
        # code...
        $slider=storeSlider::find($id);
        $slide=sliderItem::where('slider_id',$id)->where('id',$slideId)->first();
        if(!$slide){
            return  redirect()->route('slider.show',['id'=>$slider->id])->with('danger', 'Unable to find slide');
        }
        $slide->lang=$lang;
        $slide->append('strings');
        // return response()->json($slide, 200);
        $flash['language']=$lang;
        $flash['itemId']=$slide->id;
        $flash['slideActionI']=$slide->slide_action;
        $flash['slideActionValueI']=$slide->slide_value;
        $flash['slideBtnPositionI']=$slide->slide_btn_position;

        
        if($slide->strings){
            $flash['sliderTitleI']=$slide->strings['slide_name'];
            $flash['sliderTextI']=$slide->strings['slide_desc'];
        }

        session()->flashInput($flash);
        return view('vendorCpanel.sliders.updateSlide',compact('slider','slide'));   

    }

    public function slideUpdate($id,$slideId,$lang,Request $request)
    {
        
        //get slide
        $getSlide=sliderItem::find($slideId);
        if(!$getSlide){
            return  redirect()->route('slider.show',['id'=>$id])->with('danger', 'Unable to find slide');
        }

        if($request->sliderTitleI){
            $this->setTranslate('slide_name',$request->sliderTitleI,'slide',$lang,$getSlide->id);
        }
        if($request->sliderTextI){
            $this->setTranslate('slide_desc',$request->sliderTextI,'slide',$lang,$getSlide->id);
        }

        //update slide
        $getSlide->update([
            'slide_btn_position'=>$request->slideBtnPositionI,
            'slide_action'=>$request->slideActionI,
            'slide_value'=>$request->slideActionValueI,
        ]);

        return  redirect()->route('slider.show',['id'=>$id])->with('success', 'slide Successfully Updated');



    }



}



