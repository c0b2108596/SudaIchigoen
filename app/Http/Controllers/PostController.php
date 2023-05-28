<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use Illuminate\Http\Request;
use App\Models\Category;
use Cloudinary;
use App\Models\PostImage;

class PostController extends Controller
{
    public function index(Post $post)
    {
        
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post, PostImage $post_image)
    {
        $image_get = PostImage::where('post_id', '=', $post->id)->get();
        //return view('posts/show')->with(['post' => $post, 'post_image' => $post_image->first()]);
        //dd(with(['post' => $post, 'post_image' => $image_get]));
        return view('posts/show')->with(['post' => $post, 'post_image' => $image_get]);
        
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories'=>$category->get()]);
    }

    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        //dd($request['post']);
        $images = $request->file('image');
        $input = $request['post'];
        $post->fill($input)->save();
        
        foreach($images as $image)
        {
            $image_url = Cloudinary::upload($image->getRealpath())->getSecurePath();
            $post_image = New PostImage();
            $post_image->post_id = $post->id;
            $post_image->url = $image_url;
            $post_image->save();
            //dd($post_image);
       //dd($image_url);
  
        } 
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}