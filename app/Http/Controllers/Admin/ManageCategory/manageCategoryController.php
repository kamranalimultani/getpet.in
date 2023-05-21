<?php

namespace App\Http\Controllers\Admin\ManageCategory;
use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\UltraCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class manageCategoryController extends Controller
{
    public function listCat()
    {
        $allcats=MainCategory::all();
        return view('Admin.Category.listCat',compact('allcats'));
    }
    public function addCatForm(Request $req)
    {
        $uCats=UltraCat::all();
        return view('Admin.Category.addCat',compact('uCats'));
    }
    public function addCat(Request $req)
    {
        $category =new MainCategory();
        $category->main_cat_name=$req->categoryName;
        $category->main_cat_paragraph=$req->categoryParagraph;
        $category->ultraCat=$req->ultraCat;
       

        
       
        
        if($req->file('CategoryThumbnail'))
        {
            // Get filename with the extension
            $filenameWithExt = $req->file('CategoryThumbnail')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('CategoryThumbnail')->getClientOriginalExtension();
            // Filename to store
            $CategoryThumbnail = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('CategoryThumbnail')->storeAs('public/Admin/category/',$CategoryThumbnail);

            $category->main_cat_small_image=$CategoryThumbnail;
        }
        if($req->file('CategoryBanner'))
        {
            // Get filename with the extension
            $filenameWithExt = $req->file('CategoryBanner')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('CategoryBanner')->getClientOriginalExtension();
            // Filename to store
            $CategoryBanner = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('CategoryBanner')->storeAs('public/Admin/category/',$CategoryBanner);
            $category->main_cat_banner_image=$CategoryBanner;
        }
        $result= $category->save();
        return redirect('admin/category/list');

            

    
                




        
        
    }
    public function editCatForm($id)
    {
        $category=MainCategory::find($id);
        return view('Admin.Category.editCatFrom',compact('category'));
    }
    public function editCat(Request $req)
    {
        $category =MainCategory::find($req->hiddenCatid);
        $category->main_cat_name=$req->categoryName;
        $category->main_cat_paragraph=$req->categoryParagraph;
        

        
       
        
        if($req->file('CategoryThumbnail'))
        {
            $deletefile=storage_path('app/public/Admin/category/'.$category->main_cat_small_image);
            File::delete($deletefile);


            // Get filename with the extension
            $filenameWithExt = $req->file('CategoryThumbnail')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('CategoryThumbnail')->getClientOriginalExtension();
            // Filename to store
            $CategoryThumbnail = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('CategoryThumbnail')->storeAs('public/Admin/category/',$CategoryThumbnail);

            $category->main_cat_small_image=$CategoryThumbnail;
        }
        if($req->file('CategoryBanner'))
        {
            $deletefile=storage_path('app/public/Admin/category/'.$category->main_cat_banner_image);
            File::delete($deletefile);
            // Get filename with the extension
            $filenameWithExt = $req->file('CategoryBanner')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('CategoryBanner')->getClientOriginalExtension();
            // Filename to store
            $CategoryBanner = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('CategoryBanner')->storeAs('public/Admin/category/',$CategoryBanner);
            $category->main_cat_banner_image=$CategoryBanner;
        }
        $result= $category->save();
        if($result)
        {
            session(['msg-success' => 'Category has been Edited']);
        }   
        else
        {
            session(['msg-error' => 'Something went wrong could not add company']);
        }
        return redirect('admin/category/list');
    }
    public function deleteCat(Request $req)
    {
        $category=MainCategory::find($req->deleteCategory);
        $deleteThumbnail=storage_path('app/public/Admin/category/'.$category->main_cat_small_image);
        $deleteBanner=storage_path('app/public/Admin/category/'.$category->main_cat_banner_image);
        File::delete($deleteThumbnail);
        File::delete($deleteBanner);
        $result=$category->delete();
        if($result)
        {
            session(['msg-success' => 'Category has been deleted']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add company']);
        }
        return redirect('admin/category/list');
    }
}
