@extends('Admin.index',['title'=>'Add Category '])
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
                  <form  action="{{url('admin/category/add')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="row">

                        <div class="form-group col-md-6">
                           <label for="exampleInputEmail1">Catgory Name</label>
                           <input type="" name="categoryName" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="exampleInputEmail1">Main Category</label>
                           <select onchange="renderSubCat()"  name="ultraCat" class="form-control" id="ultraCat" placeholder="Enter email">
                               <option value="0">--Choose--</option>
                               
       
                                   @foreach ($uCats as $item)
                                   <option value="{{$item->uCat_id}}">{{$item->uCatName}}</option>
                                   @endforeach
                               
                           </select>
                        </div>
                        
                     </div>
                     
                     <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Category Paragraph</label>
                        <textarea type="text" name="categoryParagraph" class="form-control" id="editor" placeholder="Category Paragraph">
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

<script>
   ClassicEditor
       .create( document.querySelector( '#editor' ) )
       .catch( error => {
           console.error( error );
       } );
</script>
@endsection