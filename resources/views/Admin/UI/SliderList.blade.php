@extends('Admin.index',['title'=>'Dashboard'])
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
   <div>
      
      <a href="{{url('admin/ui/slider/add')}}" class="float-right btn btn-primary m-2">Add Slider</a>

   </div>
    
    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
      <thead>
         <tr role="row">
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" " >S.No.</th>
            
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Image</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending"  >Content</th>
            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" ">Action</th>
         </tr>
     </thead>
    
      
    
     <tbody id="ProductTable">
         @include('Admin.UI.SliderTable')
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
<div class="modal fade show" id="modal-default" style=" padding-right: 17px;" aria-modal="true" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
         </div>
         <form action="{{url('/admin/ui/slide/delete')}}" method="POST">
            @csrf
            <div class="modal-body">
               <h4>Are you sure you want to delte this product?</h4>
               <input  type="hidden" name="deleteSLideInput" id="deleteSLideInput" type="text"  >
            </div>
            <div class="modal-footer justify-content-between">
              
               <button type="submit" class="btn btn-danger">Delete</button>
         </form>
         </div>
      </div>
   </div>
</div>
@endsection