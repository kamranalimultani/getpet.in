@foreach ($AllTags as $tag)
<tr >
   <td >{{$loop->iteration}}</td>
   <td >{{$tag->tag_name}}</td>
   
   <td>
      <a title="Click here to Edit"  href="{{url('admin/posts/tags/edit/'.$tag->tag_id )}}" class="btn btn-primary" style="margin-right:5px"><i class="fa fa-pen"></i></a>
      <button type="button" title="Click here to Delete" onclick="deleteCategory({{$tag->tag_id }})" class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
   </td>
</tr>
@endforeach
<script>
   function deleteCategory($repairID) {
   $("#modal-default").modal("show");
   $("#deleteCategory").val($repairID);
   }
</script>