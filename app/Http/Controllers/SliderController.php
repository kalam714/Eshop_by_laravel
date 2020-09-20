<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addSlider(){
        return view('admin.addSlider');
    }
    public function slider(){
        $sliders=Slider::get();
        return view('admin.slider')->with('sliders',$sliders);
    }
    public function saveslider(Request $request){
        $this->validate($request,[
            'description_one' =>'required',
            'description_two' =>'required',
            'slider_image' =>'image|nullable|max:1999',
          ]);

          if($request->hasFile('slider_image')){
            $fileNameWithExt=$request->file('slider_image')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('slider_image')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('slider_image')->storeAS('public/slider_images',$fileNameToStore);

        }else{

            $fileNameToStore="noimage.jpg";
        }
        $slider=new Slider();
        $slider->description_one=$request->input('description_one');
        $slider->description_two=$request->input('description_two');
        $slider->slider_image=$fileNameToStore;
        $slider->status=1;
        $slider->save();
        return redirect('/addslider')->with('status','The '.$slider->slider_name.' has been save successfully');
    }

    public function deleteslider($id){
        $slider=Slider::find($id);
        if($slider->slider_image !="noimage.jpg"){
            Storage::delete('publice/slider_images/'.$slider->slider_image);
        }
        $slider->delete();
        return redirect('/slider');
    
    }
    public function active($id){
        $slider=Slider::find($id);
        $slider->status=1;
        $slider->update();
        return redirect('/slider');
    }
    public function unactive($id){
        $slider=Slider::find($id);
        $slider->status=0;
        $slider->update();
        return redirect('/slider');
    }
}
