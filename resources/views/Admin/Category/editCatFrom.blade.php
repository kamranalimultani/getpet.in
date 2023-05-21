@extends('Admin.index',['title'=>'Edit Category '])
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">Manage Category</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
               <li class="breadcrumb-item active">Category</li>
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
                  <form  action="{{url('admin/category/edit')}}" method="POST" enctype="multipart/form-data">
                     @csrf
<div class="row">

   <div class="form-group col-md-6">
      <input type="hidden" name="hiddenCatid" value="{{$category->main_cat_id}}">
      <label for="exampleInputEmail1">Catgory Name</label>
      <input type="" name="categoryName" class="form-control" id="exampleInputEmail1" placeholder="Category Name" value="{{$category->main_cat_name}}">
   </div>
   <div class="form-group col-md-6">
      <label for="exampleInputEmail1">Main Category</label>
     <input class="form-control" readonly type="text" value="{{$category->ultraCat}}">
   </div>
</div>
                     
                     <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Category Paragraph</label>
                        <textarea type="text" name="categoryParagraph" class="form-control" id="exampleInputPassword1" placeholder="Category Paragraph">
                            {{$category->main_cat_paragraph}}
                        </textarea>
                     </div>
                     <div class="row">

                         <div class="form-group col-md-4 d-flex flex-column">
                             <label for="exampleInputFile">Category Thumbanil</label>
                             <input type="file" class="" name="CategoryThumbnail" id="exampleInputFile">
                            </div>
                            <div class="form-group col-md-4 d-flex flex-column">
                                <label for="exampleInputFile">Category Banner</label>
                                <input type="file" class="" name="CategoryBanner" id="exampleInputFile">
                            </div>
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