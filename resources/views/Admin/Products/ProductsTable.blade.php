


@foreach ($products as $item)

<tr >
   
   <td >{{$loop->iteration}}</td>
   
   <td>
    @if($item->p_main_image)
    
        <img height="100px" width="auto" src=" {{('/storage/app/public/Admin/Products/'.$item->p_main_image)}}" alt="{{$item->p_main_image}}"></td>
    
    @endif
    
   
   <td >{{$item->p_name	}}</td>
   <td>{{$item->p_description}}</td>
   <td>

       <a title="Click here to Edit"  href="{{url('/admin/products/edit/'.$item->p_id)}}" class="btn btn-primary" style="margin-right:5px"><i class="fa fa-pen"></i></a>
       
       <button type="button" title="Click here to Delete" onclick="deleteProduct({{$item->p_id}})" class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
    
   </td>
</tr>
@endforeach
    
   
<script>
   function deleteProduct(id) {
  $("#product-deleteModal").modal("show");
  $("#deletePInput").val(id);
}
</script>

   
   
   

