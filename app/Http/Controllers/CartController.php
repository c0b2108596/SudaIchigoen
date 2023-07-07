<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemImage;
use App\Models\Cart;
use App\Models\user;
use Cloudinary;
use App\Models\Item;
use App\Http\Requests\ItemRequest;


class CartController extends Controller
{
    public function add_cart(Request $request, Cart $cart, Item $item) //カートに商品を追加する(カートに追加ボタンを押された時の処理)
    {
        $user_id = auth()->user()->id;
        $item_id = $request->id;
        $item_stock = Item::where("id", "=", $item_id)->first();
        $cart_content = Cart::where("user_id", "=", $user_id)->where("item_id", "=", $item_id)->first();
        
        if ($cart_content === null) //カートの中身がなければidと個数を1に設定
        {   
            $cart->user_id=$user_id;
            $cart->item_id=$item_id;
            $cart->num=1;
            $item_stock->stock-=1;
            $cart->save();
            $item_stock->save();
        }else{                    //カートに中身がある時、個数を1個追加
            $cart_content->num+=1;
            $item_stock->stock-=1;
            $cart_content->save();
            $item_stock->save();
        }
        
        return redirect('/items/item');
    }
    
    public function show(Cart $cart, Item $item, ItemImage $item_img) //ユーザーごとのカートの中身を参照する
    {
        $user_id = auth()->user()->id;
        $cart_gets = Cart::where('user_id', "=", $user_id)->get();
        
        return view("carts.cart")->with(["carts" => $cart_gets, "item" => $item->get()]);
    }
    
}
