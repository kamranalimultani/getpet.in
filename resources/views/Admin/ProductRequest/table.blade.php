a@foreach ($requests as $item)
    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $item->name }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->StateId }}</td>

        <td>
            <img width="100px"
                src="https://imgs.search.brave.com/2G5pf-GMSCE4k6p4NPohfz-2fnVjm7sswPJUfSEElaU/rs:fit:759:225:1/g:ce/aHR0cHM6Ly90c2Uz/Lm1tLmJpbmcubmV0/L3RoP2lkPU9JUC5Y/XzY1dUlKa1NGOGJK/bF96eVU0dHdnSGFF/byZwaWQ9QXBp"
                alt="{{ $item->slider_banner }}">
        </td>
        {{-- @if ($item->slider_banner)
            <img width="100px" src=" {{('/storage/app/public/Admin/UI/'.$item->slider_banner)}}" alt="{{$item->slider_banner}}"></td>
    
    
    @endif
   --}}
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->created_at->format('d-D/M/Y') }}</td>
        <td>{{ $item->status }}</td>
        <td>
            <a title="Click here to Edit" href="{{ url('admin/ui/slide/edit/' . $item->id) }}" class="btn btn-primary"
                style="margin-right:5px"><i class="fa fa-pen"></i></a>
            <button type="button" title="Click here to Delete" onclick="deleteSliderBanner({{ $item->id }})"
                class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
            <button type="button" title="Click here to Delete" onclick="changeStatus({{ $item->id }})"
                class="btn {{ $item->status == 'Pending' ? 'btn-danger' : 'btn-success' }} mt-1">{{ $item->status == 'Pending' ? 'Pending' : 'Approved' }}</button>
        </td>
    </tr>
@endforeach


<script>
    function deleteSliderBanner($repairID) {
        $("#modal-default").modal("show");
        $("#deleteSLideInput").val($repairID);
    }
</script>
