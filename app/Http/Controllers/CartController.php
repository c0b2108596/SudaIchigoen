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
    public function add_cart(Request $request, Cart $cart)
    {
        $user_id = auth()->user()->id;
        $item_id = $request->id;
        $cart_content = Cart::where("user_id", "=", $user_id)->where("item_id", "=", $item_id)->first();
        if ($cart_content === null)
        {   
            $cart->user_id=$user_id;
            $cart->item_id=$item_id;
            $cart->num=1;
            $cart->save();
        }else{
            $cart_content->num+=1;
            $cart_content->save();
        }
        
        return redirect('/items/item');
    }
    
    public function show(Cart $cart, Item $item, ItemImage $item_img)
    {
        $user_id = auth()->user()->id;
        $cart_gets = Cart::where('user_id', "=", $user_id)->get();
        
        return view("carts.cart")->with(["carts" => $cart_gets, "item" => $item->get()]);
    }
    
}
