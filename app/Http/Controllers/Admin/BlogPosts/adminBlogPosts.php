<?php

namespace App\Http\Controllers\Admin\BlogPosts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Posts;
use App\Models\PTag;
use App\Models\TagsModel;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminBlogPosts extends Controller
{
   public function listTags()
   {
    $AllTags=PTag::get();
    return view("Admin.ManageTags.listTags",compact('AllTags'));
   }
   public function addTagForm()
   {
      return view("Admin.ManageTags.addTags");
   }
   public function addTag(Request $req)
   {
      $tag=new PTag();
      $tag->tag_name=$req->tagname;
      $result=$tag->save();
      if($result)
      {
          session(['msg-success' => 'Tag has been added']);
      }
      else
      {
          session(['msg-error' => 'Something went wrong could not add product']);
      }
      return redirect('admin/posts/tags');
   }
   public function editTagForm($id)
   {
         $tag= PTag::find($id);
         return view("Admin.ManageTags.addTags",compact("tag"));
   }
   public function editTag(Request $req)
   {
    $tag=PTag::find($req->hiddenId);
    $tag->tag_name=$req->tagname;
    $result=$tag->update();
    if($result)
    {
        session(['msg-success' => 'Tag has been updated']);
    }
    else
    {
        session(['msg-error' => 'Something went wrong could not add product']);
    }
    return redirect('admin/posts/tags');
   }
   public function deleteTag(Request $req)
   {
        $tag=PTag::find($req->hiddenId);
        $result=$tag->delete();
        if($result)
        {
            session(['msg-success' => 'Tag has been deleted']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add product']);
        }
        return redirect('admin/posts/tags');
   }

    //    posts
    public function listPost()
    {
        $posts=DB::table('tbl_posts')
        ->join('posts_tags', 'tbl_posts.post_tag_id', '=', 'posts_tags.tag_id')
        ->get();
      return view('Admin.BlogsPost.listPost',compact('posts'));
    }
    public function addPostsForm(Request $req)
    {
        $tags=PTag::get();
        return view('Admin.BlogsPost.AddPost',compact('tags'));
    }
    public function addPost(Request $req)
    {
        $post=new Post();
        $post->post_tag_id=$req->tagId;
        $post->post_title=$req->title;
        $post->post_content	=$req->content;
        if($req->file('PostThumbnail'))
        {
            // Get filename with the extension
            $filenameWithExt = $req->file('PostThumbnail')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('PostThumbnail')->getClientOriginalExtension();
            // Filename to store
            $postThumbnail = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('PostThumbnail')->storeAs('public/Admin/Posts/',$postThumbnail);

            $post->post_image=$postThumbnail;
        }
        $post->post_video_link=$req->vide_url;
        $result=$post->save();
        if($result)
        {
            session(['msg-success' => 'Post has been added']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add product']);
        }
        return redirect('admin/posts');
    }
    public function deletePost(Request $req)
    {
        $post=Post::find($req->deleteID);
        $deletefile=storage_path('app/public/Admin/Posts/'.$post->post_image);
        File::delete($deletefile);
        $result=$post->delete();
        if($result)
        {
            session(['msg-success' => 'Post has been deleted']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add product']);
        }
        return redirect('admin/posts');
    }
    public function editPostForm($id)
    {
        $post=Post::find($id);
        $tags=PTag::get();
        
        return view('Admin.BlogsPost.AddPost',compact('tags','post'));
    }
    public function editPost(Request $req)
    {
        $post=Post::find($req->hiddenId);
        $post->post_tag_id=$req->tagId;
        $post->post_title=$req->title;
        $post->post_content	=$req->content;
        // 
       
        if($req->file('PostThumbnail'))
        {
            $deletefile=storage_path('app/public/Admin/Posts/'.$post->post_image);
            File::delete($deletefile);
            // Get filename with the extension
            $filenameWithExt = $req->file('PostThumbnail')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $req->file('PostThumbnail')->getClientOriginalExtension();
            // Filename to store
            $postThumbnail = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $req->file('PostThumbnail')->storeAs('public/Admin/Posts/',$postThumbnail);

            $post->post_image=$postThumbnail;
        }
        $post->post_video_link=$req->vide_url;
        $result=$post->save();
        if($result)
        {
            session(['msg-success' => 'Post has been added']);
        }
        else
        {
            session(['msg-error' => 'Something went wrong could not add product']);
        }
        return redirect('admin/posts');
    }
}
