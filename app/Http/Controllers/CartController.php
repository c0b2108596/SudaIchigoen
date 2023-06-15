<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockImage;
use App\Models\Cart;
use App\Models\user;
use Cloudinary;
use App\Models\Stock;

class CartController extends Controller
{
    public function add_cart(Request $request, Cart $cart, Stock $stock)
    {
        //dd($request->stock_id);
        $user_id = auth()->user()->id;
        //$cart->attach($request->stock_id);
        $cart->user_id=$user_id;
        $cart->save();
        $cart->stocks()->attach($request->stock_id);
        $stock_id = $request->stock_id;
        $mycart[$stock_id]=1;
        
        if(in_array($stock_id, $mycart)){
            $mycart[$stock_id] += 1;
        }else{
            $cart->stocks()->attach($request->stock_id);
        }
        return redirect('/stocks/stock')->with(["mycart" => $mycart]);
    }
    
    public function cart(User $user, Cart $cart, Stock $stock)
    {
        $cart = Cart::where('user_id', "=", $user->id)->get();
        $data['count']=0;
        $data['sum']=0;
        
        foreach($cart as $mycart)
        {
            $data['count']++;
        }
    
        return view('carts.cart')->with(["carts" => $cart, "data"=>$data]);
    }
}
