<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemImage;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Cloudinary;
use App\Models\Item;
use App\Http\Requests\ItemRequest;


class CartController extends Controller
{
    public function add_cart(Request $request, Cart $cart, Item $item) //カートに商品を追加する(カートに追加ボタンを押された時の処理)
    {
        $total_cash = 0;
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
    
    public function show(Cart $cart, Item $item) //ユーザーごとのカートの中身を参照する
    {
        $user_id = auth()->user()->id;
        $data['my_carts'] = Cart::where('user_id', "=", $user_id)->get();
        
        $data['count'] = 0;
        $data['sum'] = 0;
        
        foreach($data['my_carts'] as $my_cart){
            $data['count'] += $my_cart->num;
            $data['sum'] += $my_cart->item->price * $my_cart->num;
        }
        
        return view("carts.cart")->with(["data" => $data, "item" => $item->get()]);
    }
    
    public function purchase(Request $request, Order $order)
    {   
        $input = ["user_id" => $request["id"]];
        $input += ["price" => $request["sum"]];
        $order->fill($input)->save();
        
        return redirect('/cash/create/' . $order->id);
    }
    
    public function delete(Item $item) //商品の削除
    {
        Gate::authorize('admin');
    
        $item->delete();
        return redirect('/');
    }
}
