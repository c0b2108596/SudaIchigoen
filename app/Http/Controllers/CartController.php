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
    public function cart(User $user, Cart $cart, Stock $stock)
    {
        $cart = Cart::where('user_id', "=", $user->id)->get();
        
        return view('carts.cart')->with(["carts" => $cart]);
    }
}
