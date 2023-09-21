<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
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
    
    public function show(Post $post, PostImage $post_image) //投稿の詳細を表示する
    {
        $image_get = PostImage::where('post_id', '=', $post->id)->get(); //投稿ごとの画像に絞り込む
        
        return view('posts/show')->with(['post' => $post, 'post_image' => $image_get]);
    }

    public function create(Category $category) //投稿作成する(管理者用)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        return view('posts/create')->with(['categories'=>$category->get()]);
    }

    public function store(Post $post, PostRequest $request) //投稿を保存する(管理者用)
    {   
        
        $images = $request->file('image'); //取得した画像の複数の画像を変数に定義
        $input = $request['post']; //取得した投稿を変数に定義
        $post->fill($input)->save(); //input変数のデータをpostsテーブルに保存
        
        foreach($images as $image) //画像1枚ごとをpost_imagesテーブルに保存
        {
            $image_url = Cloudinary::upload($image->getRealpath())->getSecurePath(); //Cloudinaryに画像をアップロード
            $post_image = New PostImage(); //PostImagesモデルを継承した新たなインスタンスの作成
            $post_image->post_id = $post->id; //post_idに投稿のidを設定
            $post_image->url = $image_url; //urlに画像のURLを設定
            $post_image->save();//post_imagesテーブルへの保存処理
        } 
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post) //投稿を編集する(管理者用)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(Post $post, PostRequest $request) //編集した内容を更新する(管理者用)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        $input_post = $request['post']; //投稿の変更を取得し、変数に定義
        $post->fill($input_post)->save(); //変更を保存
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        $post->delete(); //投稿を削除
        return redirect('/posts/index');
    }
}