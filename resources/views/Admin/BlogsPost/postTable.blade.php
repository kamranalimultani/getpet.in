@foreach ($posts as $post)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->tag_name }}</td>
        <td>{!! $post->post_title !!}</td>
        <td>
            @if ($post->post_image)
                <img width="100px" src=" {{ ('/storage/app/public/Admin/Posts/' . $post->post_image) }}"
                    alt="{{ $post->post_image }}">
            @endif
        </td>


        <td>
            <a title="Click here to Edit" href="{{ url('admin/posts/edit/' .$post->post_id) }}" class="btn btn-primary"
                style="margin-right:5px"><i class="fa fa-pen"></i></a>
            <button type="button" title="Click here to Delete" onclick="deleteCategory({{$post->post_id }})"
                class="btn btn-danger mt-1   "><i class="fa fa-times"></i></button>
        </td>
    </tr>
@endforeach
<script>
    function deleteCategory($repairID) {
        $("#modal-default").modal("show");
        $("#deleteCategory").val($repairID);
    }
</script>
