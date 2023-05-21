<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\PImage;
use App\Models\pImagesModel;
use App\Models\Product;
use App\Models\UltraCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class productController extends Controller
{
    
    public function addProductsForm()
    {
        $uCats=UltraCat::all();
        return view('Admin.Products.AddProducts',compact('uCats'));
    }
    public function renderCats(Request $req)
    {
       
        if($req->ajax())
        {
            $subCats=MainCategory::where('ultraCat','=',$req->ultraCat)->get();
            $html='
            <label for="exampleInputEmail1">Sub Category</label>
            <select type="" name="subCat" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            <option value="0">--Choose--</option>';
            foreach($subCats as $cat) 
            {
                $html.= '
                <option value='.$cat->id .'>'.$cat->main_cat_name.'</option>';
            }
            '</select>';
        }
        return $html;
                
                
                
    }
    public function addProduct(Request $req)
    {
        $product= new Product();
        if($req->file('ProductMainIage'))
        {
            // Get filename with the extension
            $filenameWithExt = $req->file('ProductMainIage')->getClientOriginalName();
           
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('ProductMainIage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('ProductMainIage')->storeAs('public/Admin/Products',$fileNameToStore);
            $product->p_main_image=$fileNameToStore;
        }
        $product->p_cat_id=$req->subCat;
        $product->p_name=$req->productName;
        $product->p_description=$req->productDescription;
        $product->p_price=$req->Price;
        
        
        $result=  $product->save();
        if($req->ProductImage)
            {
      
               
               foreach ($req->ProductImage as $input) 
               {
                 
                  $pIMage=new PImage();
                  $filenameWithExt = $input->getClientOriginalName();
                //   dd($filenameWithExt);
                     //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                 $extension = $input->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $input->storeAs('public/Admin/Products',$fileNameToStore);
                $pIMage->p_id=$product->p_id;
                $pIMage->image_name=$fileNameToStore;
                $pIMage->save();
               }
            }
            if($result)
            {
                session(['msg-success' => 'Product has been added']);
            }
            else
            {
                session(['msg-error' => 'Something went wrong could not add product']);
            }
            return redirect('admin/products/list');

            
           
            
            
    }
    public function listProducts()
    {
        $products=Product::orderBy('p_id',"desc")->get();
       
        return view('Admin.Products.listProducts',compact('products',));
    }
    public function deleteProducts(Request $req)
    {
        $product=Product::find($req->deleteProduct);
        
        $deletefile=storage_path('app/public/Admin/Products/'.$product->p_main_image);
        File::delete($deletefile);
        
        $images=PImage::where('p_id','=',$product->p_id)->get();
        foreach ($images as $image) {
            $deletefile=storage_path('app/public/Admin/Products/'.$image->image_name);
            File::delete($deletefile);
            $image->delete();       
        }
        $result=$product->delete();
        if($result)
        {
            session(['msg-success' => 'Product has been Deleted']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not delete product']);
        }
        return redirect('admin/products/list');
        
    }
    public function editForm($id)
    {
        $product=Product::find($id);
        $images=PImage::where('p_id','=',$product->p_id)->get();
      
        return view('Admin.Products.editForm',compact('product',"images"));
    }
    public function editProuct(Request $req)
    {
        $product= Product::find($req->hiddenPID);
        if($req->file('ProductMainIage'))
        {
            // Get filename with the extension
            $filenameWithExt = $req->file('ProductMainIage')->getClientOriginalName();
           
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('ProductMainIage')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('ProductMainIage')->storeAs('public/Admin/Products',$fileNameToStore);
            $product->p_main_image=$fileNameToStore;
        }
     
        $product->p_name=$req->productName;
        $product->p_description=$req->productDescription;
        $product->p_price=$req->Price;
        $result=  $product->save();
        
        $images=PImage::where('p_id','=',$product->p_id);
       
        if($req->ProductImage)
            {
      
               
               foreach ($req->ProductImage as $input) 
               {
                 
                  $pIMage=new PImage();
                  $filenameWithExt = $input->getClientOriginalName();
                //   dd($filenameWithExt);
                     //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                 $extension = $input->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                // Upload Image
                $path = $input->storeAs('public/Admin/Products',$fileNameToStore);
                $pIMage->p_id=$product->p_id;
                $pIMage->image_name=$fileNameToStore;
                $pIMage->save();
               }
            }
            if($result)
            {
                session(['msg-success' => 'Product has been added']);
            }
            else
            {
                session(['msg-error' => 'Something went wrong could not add product']);
            }
            return redirect('admin/products/list');
    }
    
    }
