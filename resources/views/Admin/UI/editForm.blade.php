@extends('Admin.index',['title'=>'Dashboard'])
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Manage Slider</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">Manage Slider</li>
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
   
    <form  action="{{url('admin/ui/slide/edit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="hiddenslideID" value="{{$slider->slider_id}}">
         <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Slider Heading</label>
         <input type="" name="sliderHeading" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$slider->slider_heading}}">
         </div>
         <div class="form-group col-md-6">
         <label for="exampleInputPassword1">Slider Paragraph</label>
         <textarea type="text" name="slider_para" class="form-control" id="exampleInputPassword1" placeholder=""  >
            {{$slider->slider_paragraph}}
         </textarea>
         </div>
         <div class="form-group col-md-4">
         <label for="exampleInputFile">File input</label>
         <input type="file" class="" name="sliderBanner" id="productImage">
        </div>
        <div class="col-xs-12 col-md-2  ">
            <img id="imagepreview"  width="300px" height="100px" class="img-thumbnail m-4" src="{{'/storage/app/public/Admin/UI/'.$slider->slider_banner}}"  alt="{{$slider->slider_banner}}" >
         </div>
         
         
         <button type="submit" class="btn btn-success">Save</button>
    </form>
   
</div>
</div>
</div>
</div>
</div>
</div>
<script>


    // product image logo live preview
const ProductImage = document.getElementById("productImage");
const productImagePreview = document.getElementById("imagepreview");
ProductImage.addEventListener("change", function () {
  const productImageFIle = this.files[0];
  if (productImageFIle) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      productImagePreview.setAttribute("src", this.result);
    });
    reader.readAsDataURL(productImageFIle);
  }
});
</script>
@endsection