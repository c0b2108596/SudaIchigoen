<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category) //カテゴリーボタンが押された時にカテゴリー順に並び変える
    {
        return view('categories.index')->with(['posts'=>$category->getByCategory()]);
    }
    
}
