@extends('Admin.index',['title'=>'Add Category '])
@section('content')
<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1 class="m-0">{{isset($tag)?"Edit Tag":"Add Tags"}}</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
               <li class="breadcrumb-item active">Tags</li>
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
                  <form  action="{{isset($tag)?url('admin/posts/tags/edit'): url('admin/posts/tags/add')}}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="row">

                        <div class="form-group col-md-6">
                           <label for="exampleInputEmail1">Tag Name</label>
                           <input type="hidden" name="hiddenId" value="{{isset($tag)?$tag->tag_id:''}}" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                           <input type="" name="tagname" value="{{isset($tag)?$tag->tag_name:''}}" class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                        </div>
                       
                        
                     </div>
                     
                     
                    
                     <button type="submit" class="btn btn-success">{{isset($tag)?"Update":"Save"}}</button>
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