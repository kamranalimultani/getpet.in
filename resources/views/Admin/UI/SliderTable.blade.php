


@foreach ($allSlides as $slide)

<tr >
   
   <td >{{$loop->iteration}}</td>
   
   <td >{{$slide->slider_heading}}</td>
   <td>{{$slide->slider_paragraph}}</td>
   <td>
    @if($slide->slider_banner)
    
        <img width="100px" src=" {{('/storage/app/public/Admin/UI/'.$slide->slider_banner)}}" alt="{{$slide->slider_banner}}"></td>
    
    @endif
   
   <td>
      <a title="Click here to Edit"  href="{{url('admin/ui/slide/edit/'.$slide->slider_id)}}" class="btn btn-primary" style="margin-right:5px"><i class="fa fa-pen"></i></a>
     
      <button type="button" title="Click here to Delete" onclick="deleteSliderBanner({{$slide->slider_id}})" class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
   </td>
</tr>
@endforeach
    
   
<script>
   function deleteSliderBanner($repairID) {
  $("#modal-default").modal("show");
  $("#deleteSLideInput").val($repairID);
}
</script>

   
   
   

