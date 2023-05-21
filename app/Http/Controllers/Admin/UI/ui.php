<?php

namespace App\Http\Controllers\Admin\UI;

use App\Http\Controllers\Controller;
use App\Models\ui_model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ui extends Controller
{
    public function sliderList()
    {
        $allSlides=ui_model::all();
        
        return view('Admin.UI.SliderList',compact('allSlides'));
    }

    public function AddSliderForm()
    {
        return view('Admin.UI.sliderAdd');
    }
    public function AddSlider(Request $req)
    {
        $slider=new ui_model();
        if($req->file('sliderBanner'))
        {
            

                //Storage::delete('/public/avatars/'.$user->avatar);
    
                // Get filename with the extension
                $filenameWithExt = $req->file('sliderBanner')->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $req->file('sliderBanner')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $req->file('sliderBanner')->storeAs('public/Admin/UI',$fileNameToStore);
    
                $slider->slider_banner=$fileNameToStore;
    
                
        }
        $slider->slider_heading=$req->sliderHeading;
        $slider->slider_paragraph=$req->slider_para;
        
        
        $result=$slider->save();
        if($result)
        {
            session(['msg-success' => 'Company has been added']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add company']);
        }
        return redirect('admin/ui/slider/list');
    }
    public function editSliderForm($id)
    {
        $slider=ui_model::find($id);
        return view('Admin.UI.editForm',compact('slider'));
    }

    public function editSlider(Request $req)
    {
        $slide=ui_model::find($req->hiddenslideID);
        
        if($req->file('sliderBanner'))
        {
            $deletefile=storage_path('app/public/Admin/UI/'.$slide->slider_banner);
            File::delete($deletefile);
            // Get filename with the extension
            $filenameWithExt = $req->file('sliderBanner')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('sliderBanner')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('sliderBanner')->storeAs('public/Admin/UI',$fileNameToStore);

            $slide->slider_banner=$fileNameToStore;
        }
        $slide->slider_heading=$req->sliderHeading;
        $slide->slider_paragraph=$req->slider_para;   
       $result= $slide->save();
        if($result)
        {
            session(['msg-success' => 'Slide has been Edited']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add company']);
        }
            return redirect('admin/ui/slider/list');
    }
    public function deletslide(Request $req)
    {
        $slide=ui_model::find($req->deleteSLideInput);
        
        $deletefile=storage_path('app/public/Admin/UI/'.$slide->slider_banner);
        File::delete($deletefile);
        $result=$slide->delete();
        
        if($result)
        {
            session(['msg-success' => 'Slide has been Deleted']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add company']);
        }
        return redirect('admin/ui/slider/list');
        
        
    }
}
