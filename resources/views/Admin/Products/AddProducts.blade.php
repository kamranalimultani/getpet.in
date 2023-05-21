@extends('Admin.index',['title'=>'Add Products'])
@section('content')
<div class="content-header">
    <div class="container-fluid">
       <div class="row mb-2">
          <div class="col-sm-6">
             <h1 class="m-0">Add Products </h1>
          </div>
          <div class="col-sm-6">
             <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Products</li>
             </ol>
          </div>
       </div>
    </div>
 </div>

 <div class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header border-0">
       <div class="d-flex justify-content-between">
       </div>
    </div>
    <div class="card-body">
       
        <form  action="{{url('admin/products/add')}}"  enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Product Name*</label>
                    <input type="" name="productName" data-role="tagsinput" class="form-control" id="exampleInputEmail1" placeholder="Product Name">
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">Main Category*</label>
                    <select onchange="renderSubCat()"  name="ultraCat" class="form-control" id="ultraCat">
                        <option value="0">--Choose--</option>
                        

                            @foreach ($uCats as $item)
                            <option value="{{$item->uCat_id}}">{{$item->uCatName}}</option>
                            @endforeach
                        
                    </select>
                </div>
                <div id="subCatReplace" class="form-group col-md-2">
                    <label for="exampleInputEmail1">Sub Category*</label>
                    <select type="" name="subCat" class="form-control" id="exampleInputEmail1" >
                        <option value="0">--Choose--</option>
                       
                    </select>
                </div>
                <div  class="form-group col-md-2">
                    <label for="exampleInputEmail1">Price*</label>
                    <input type="number" name="Price" class="form-control" id="exampleInputEmail1" placeholder="Price">
                        
                       
                    
                </div>
            </div>
            <div class="form-group col-12">
                <label for="exampleInputPassword1">Product Description</label>
            
             <textarea rows="5" type="text" name="productDescription" class="form-control" id="editor" placeholder="Description">
             </textarea>
             </div>
             <br>
             {{-- main image --}}
             <div class="row mt-4">
                 <div class="form-group col-md-3 d-flex flex-column">
                     <label for="exampleInputFile">Main Image*</label>
                     <input type="file"  name="ProductMainIage" id="PMainImage">
                 </div>
                 <div class="col-md-3">
                    <img id="PpreviewMainImage" height="100" width="100" src="https://imgs.search.brave.com/VbMZg038i2Te1avbzK4NgLEVetcVxGjMXEhxIMh4GCk/rs:fit:512:512:1/g:ce/aHR0cDovL2ljb25z/Lmljb25hcmNoaXZl/LmNvbS9pY29ucy9k/dGFmYWxvbnNvL2lv/czgvNTEyL1ByZXZp/ZXctaWNvbi5wbmc" >
                 </div>
             </div>
             <br>
             <div class="row">
                <div class="form-group col-md-3 d-flex flex-column">
                    <label for="exampleInputFile">Image 1</label>
                    <input type="file"  name="ProductImage[]" id="pImage1">
                </div>
                <div class="col-md-3">
                   <img id="preview1" height="100" width="100" src="https://imgs.search.brave.com/VbMZg038i2Te1avbzK4NgLEVetcVxGjMXEhxIMh4GCk/rs:fit:512:512:1/g:ce/aHR0cDovL2ljb25z/Lmljb25hcmNoaXZl/LmNvbS9pY29ucy9k/dGFmYWxvbnNvL2lv/czgvNTEyL1ByZXZp/ZXctaWNvbi5wbmc" >
                </div>
                <div class="form-group col-md-3 d-flex flex-column">
                    <label for="exampleInputFile">Image 2</label>
                    <input type="file"  name="ProductImage[]" id="pImage2">
                </div>
                <div class="col-md-3">
                   <img id="preview2" height="100" width="100" src="https://imgs.search.brave.com/VbMZg038i2Te1avbzK4NgLEVetcVxGjMXEhxIMh4GCk/rs:fit:512:512:1/g:ce/aHR0cDovL2ljb25z/Lmljb25hcmNoaXZl/LmNvbS9pY29ucy9k/dGFmYWxvbnNvL2lv/czgvNTEyL1ByZXZp/ZXctaWNvbi5wbmc" >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-md-3 d-flex flex-column">
                    <label for="exampleInputFile">Image 3</label>
                    <input type="file"  name="ProductImage[]" id="pImage3">
                </div>
                <div class="col-md-3">
                   <img id="preview3" height="100" width="100" src="https://imgs.search.brave.com/VbMZg038i2Te1avbzK4NgLEVetcVxGjMXEhxIMh4GCk/rs:fit:512:512:1/g:ce/aHR0cDovL2ljb25z/Lmljb25hcmNoaXZl/LmNvbS9pY29ucy9k/dGFmYWxvbnNvL2lv/czgvNTEyL1ByZXZp/ZXctaWNvbi5wbmc">
                </div>
                <div class="form-group col-md-3 d-flex flex-column">
                    <label for="exampleInputFile">Image 4</label>
                    <input type="file"  name="ProductImage[]" id="pImage4">
                </div>
                <div class="col-md-3">
                   <img id="preview4" height="100" width="100" src="https://imgs.search.brave.com/VbMZg038i2Te1avbzK4NgLEVetcVxGjMXEhxIMh4GCk/rs:fit:512:512:1/g:ce/aHR0cDovL2ljb25z/Lmljb25hcmNoaXZl/LmNvbS9pY29ucy9k/dGFmYWxvbnNvL2lv/czgvNTEyL1ByZXZp/ZXctaWNvbi5wbmc" >
                </div>
            </div>
               
            <button  style="padding: 7px 35px;" type="submit" class="btn btn-success mt-4">Save</button>
        </form>
             
             
             
       
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


<style>
    .ck-editor__editable {
    min-height: 200px !important;
}
</style>


    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>











    
@endsection