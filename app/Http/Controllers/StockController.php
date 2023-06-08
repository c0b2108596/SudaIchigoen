<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Requests\StockRequest;

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
    
    public function store(StockRequest $request, Stock $stock)
    {
        $input = $request['stock'];
        $stock->fill($input)->save();
        return redirect('/stocks/stock');
    }
    
    public function edit(Stock $stock)
    {
        return view('stocks.edit')->with(['stock' => $stock]);
    }
    
    public function update(StockRequest $request, Stock $stock)
    {
        $input_stock = $request['stock'];
        $stock->fill($input_stock)->save();
        
        return redirect('/stocks/' . $stock->id);
    }
    
    public function show(Stock $stock)
    {
        return view('stocks.show')->with(['stock' => $stock]);
    }
    
    public function delete(Stock $stock)
    {
        $stock->delete();
        return redirect('/stocks/stock');
    }
}
