<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function stock(Stock $stock)
    {
        return view('stocks.stock')->with(['stocks' => $stock->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('stocks.create');
    }
    
    public function store(Request $request, Stock $stock)
    {
        $input = $request['stock'];
        $stock->fill($input)->save();
        return redirect('/stocks/stock');
    }
    
}
