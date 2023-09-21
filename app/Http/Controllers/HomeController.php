<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function home(Post $post) //ホーム画面のお知らせのを表示する
    {   
        return view('home')->with(['posts'=>$post->getByLimit()]);
    }
}
