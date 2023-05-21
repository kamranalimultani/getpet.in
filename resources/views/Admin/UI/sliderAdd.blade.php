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
   
    <form  action="{{url('admin/ui/slider/add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
         <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Slider Heading</label>
         <input type="" name="sliderHeading" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
         </div>
         <div class="form-group col-md-6">
         <label for="exampleInputPassword1">Slider Paragraph</label>
         <textarea type="text" name="slider_para" class="form-control" id="exampleInputPassword1" placeholder="Password">
         </textarea>
         </div>
         <div class="form-group col-md-4">
         <label for="exampleInputFile">File input</label>
         
         
         <input type="file" class="" name="sliderBanner" id="exampleInputFile">
         
         </div>
         <button type="submit" class="btn btn-success">Save</button>
    </form>
   
</div>
</div>
</div>
</div>
</div>
</div>

@endsection