@foreach ($allcats as $cat)
<tr >
   <td >{{$loop->iteration}}</td>
   <td >{{$cat->main_cat_name}}</td>
   <td>{!!$cat->main_cat_paragraph!!}</td>
   <td>
      @if($cat->main_cat_small_image)
      <img width="100px" src=" {{('/storage/app/public/Admin/category/'.$cat->main_cat_small_image)}}" alt="{{$cat->main_cat_small_image}}">
      @endif
   </td>
   @if($cat->main_cat_banner_image)
   <td>
      <img width="100px" src=" {{('/storage/app/public/Admin/category/'.$cat->main_cat_banner_image)}}" alt="{{$cat->main_cat_banner_image}}">
   </td>
   @endif
   
   <td>
      <a title="Click here to Edit"  href="{{url('admin/category/edit/'.$cat->main_cat_id )}}" class="btn btn-primary" style="margin-right:5px"><i class="fa fa-pen"></i></a>
      <button type="button" title="Click here to Delete" onclick="deleteCategory({{$cat->main_cat_id }})" class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
   </td>
</tr>
@endforeach
<script>
   function deleteCategory($repairID) {
   $("#modal-default").modal("show");
   $("#deleteCategory").val($repairID);
   }
</script>