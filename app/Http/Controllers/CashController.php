<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class CashController extends Controller
{
    public function create(Order $order)
    {
        return view('cashs.create')->with(['order' => $order]);
    }
    
    
    public function store(Request $request, Order $order)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_secret_key'));

        try {
            \Stripe\Charge::create([
                'source' => $request->stripeToken,
                'amount' => $request['price'],
                'currency' => 'jpy',
            ]);
        } catch (Exception $e) {
            return back()->with('flash_alert', '決済に失敗しました！('. $e->getMessage() . ')');
        }
        return back()->with('status', '決済が完了しました！');
    }
}
