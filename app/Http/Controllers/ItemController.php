<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemRequest;
use Cloudinary;
use App\Models\ItemImage;
use App\Models\Cart;
use App\Models\user;
use Gate;

class ItemController extends Controller
{
    public function item() //商品を一覧表示する。
    {   
        $items = Item::with('itemImage')->get(); //商品の画像の最初の1件を取得し、変数に定義
        
        return view('items.item', compact('items')); 
    }
    
    public function create(Item $item) //新しい商品を投稿(管理者のみ)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限

        return view('items.create');
    }
    
    public function store(ItemRequest $request, Item $item) //新しい商品を保存する(管理者のみ)
    {  
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        $images = $request->file('image'); //取得した画像が格納された配列を変数に定義
        $input_item = $request['item']; //取得した商品情報を変数に定義
        $item->fill($input_item)->save(); //商品情報をitemsテーブルに保存
        
       foreach($images as $image) //画像1枚ごとにitem_imagesテーブルに保存
        {   
            $item_url = Cloudinary::upload($image->getRealpath())->getSecurePath(); //Cloudinaryに取得した画像を1枚ずつアップロード
            $item_image = New ItemImage(); //ItemImageモデルのインスタンスを新たに作成
            $item_image->item_id = $item->id; //item_idに商品のidを設定
            $item_image->url = $item_url; //urlに画像のURLを設定
            $item_image->save(); //商品画像をitem_imagesテーブルに保存
        } 
        return redirect('/items/' . $item->id);
    }
    
    public function edit(Item $item) //商品の詳細を編集(管理者のみ)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        return view('items.edit')->with(['item' => $item]);
    }
    
    public function update(ItemRequest $request, Item $item) //商品の詳細の変更を保存(管理者のみ)
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        $input_item = $request['item']; //変更した商品情報を保存
        $item->fill($input_item)->save(); //変更を保存
        
        return redirect('/items/' . $item->id);
    }
    
    public function show(Item $item, ItemImage $itemimage) //商品の詳細を見る
    {
        $item_get = ItemImage::where('item_id', '=', $item->id)->get(); //商品のidごとに商品情報をテーブルから取得s
        
        return view('items.show')->with(['item' => $item, "item_image" => $item_get]);
    }
    
    public function delete(Item $item) //商品の削除
    {
        Gate::authorize('admin'); //authorizeによるアクセス制限
        
        $item->delete();
        return redirect('/items/item');
    }
}
