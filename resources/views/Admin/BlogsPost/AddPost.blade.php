@extends('Admin.index', ['title' => 'Add Post '])
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Blog Post</li>
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
                            <form action="{{ isset($post) ? url('admin/posts/edit') : url('admin/posts/add') }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @if (isset($post))
                                        <input type="hidden" name="hiddenId" value="{{ $post->post_id }}">
                                    @endif

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Tag Category</label>
                                        <select name="tagId" class="form-control" id="ultraCat"
                                            placeholder="Enter email">
                                            <option value="0">--Choose--</option>


                                            @foreach ($tags as $item)
                                                <option
                                                    @if (isset($post)) @if ($item->tag_id == $post->post_tag_id)
                                                selected="selected" @endif
                                                    @endif
                                                    value="{{ $item->tag_id }}">{{ $item->tag_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Title*</label>
                                        <input type="" name="title" value="{{ isset($post) ? $post->post_title : '' }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Category Name">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="exampleInputPassword1">Post Content*</label>
                                    <textarea type="text" name="content" class="form-control" id="editor" placeholder="Category Paragraph">
                                        {{ isset($post) ? $post->post_content : '' }}
                                    </textarea>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-4 d-flex flex-column">
                                        <label for="exampleInputFile">Post Video</label>
                                        <input type="text" value="{{ isset($post) ? $post->post_video_link : '' }}"
                                            class="form-control" name="vide_url" id="exampleInputFile">
                                    </div>
                                    <div class="form-group col-md-4 d-flex flex-column">
                                        <label for="exampleInputFile">Post Thumbanil*</label>
                                        <input type="file" class="" name="PostThumbnail" id="exampleInputFile">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Save' }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
