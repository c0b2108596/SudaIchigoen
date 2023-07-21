<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use App\Models\Category;
use Cloudinary;
use App\Models\PostImage;
use Gate;

class PostController extends Controller
{
    public function index(Post $post) //投稿の一覧を表示する
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post, PostImage $post_image)
    {
        $image_get = PostImage::where('post_id', '=', $post->id)->get();
        
        return view('posts/show')->with(['post' => $post, 'post_image' => $image_get]);
    }

    public function create(Category $category) //投稿作成する(管理者用)
    {
        Gate::authorize('admin'); //管理者しかviewできない処理
        
        return view('posts/create')->with(['categories'=>$category->get()]);
    }

    public function store(Post $post, PostRequest $request) //投稿を保存する(管理者用)
    {   
        
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
        } 
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post) //投稿を編集する(管理者用)
    {
        Gate::authorize('admin');
        
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request) //編集した内容を更新する(管理者用)
    {
        Gate::authorize('admin');
        
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        Gate::authorize('admin');
        
        $post->delete();
        return redirect('/');
    }
}