@extends('Admin.index',['title'=>'Admin| List Products'])
@section('content')


<div class="content-header">
   <div class="container-fluid">
      @if(session()->has('msg-success'))
<div class="alert alert-success">
   <span class="glyphicon glyphicon-ok">
   {{session('msg-success')}} 
   </span>
</div>
{{session()->forget('msg-success')}} 
@elseif(session()->has('msg-error'))
{
<div class="btn btn-danger">
   <span class="glyphicon glyphicon-ok">
   {{session('msg-error')}} 
   </span>
</div>
{{session()->forget('msg-error')}} 
}
@endif




<div class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            
            <h1 class="m-0">Products</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
               <li class="breadcrumb-item active">All Products</li>
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
   <div>
      
      <a href="{{url('admin/products/add')}}" class="float-right btn btn-primary m-2">Add Product</a>

   </div>
    
    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
      <thead>
         <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" " >S.No.</th>
            
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Main Image</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"  >Name</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" ">Price</th>
        
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" ">Actions</th> 
        </tr>
     </thead>
    
      
    
     <tbody id="ProductTable">
         @include('Admin.Products.ProductsTable')
     </tbody>
     </table>
</div>
</div>
</div>
</div>
</div>
</div>
{{-- delete modal --}}
{{-- MPOPPUP MODAL --}}
<div class="modal fade show" id="product-deleteModal" style=" padding-right: 17px;" aria-modal="true" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <form action="{{url('/admin/products/delete')}}" method="POST">
            @csrf
            <div class="modal-body">
               <h4>Are you sure you want to delete this product?</h4>
               <input  type="hidden" name="deleteProduct" id="deletePInput" type="text"  >
            </div>
            <div class="modal-footer justify-content-between">
              
               <button type="submit" class="btn btn-danger">Delete</button>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection