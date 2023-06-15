<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Requests\StockRequest;
use Cloudinary;
use App\Models\StockImage;
use App\Models\Cart;
use App\Models\user;

class StockController extends Controller
{
    public function stock(Stock $stock, StockImage $stock_img)
    {   
        //dd(StockImage::where('stock_id', '=', $stock->id));
        $img_gets = StockImage::where('stock_id', '=', $stock->id)->get();
        
        return view('stocks.stock')->with(['stocks' => $stock->getPaginateByLimit(), "stock_image" => $img_gets]);
    }
    
    public function create()
    {
        return view('stocks.create');
    }
    
    public function store(StockRequest $request, Stock $stock)
    {  
        $images = $request->file('image');
        $input_stock = $request['stock'];
        $stock->fill($input_stock)->save();
        
        foreach($images as $image)
        {   
            $stock_url = Cloudinary::upload($image->getRealpath())->getSecurePath();
            $stock_image = New StockImage();
            $stock_image->stock_id = $stock->id;
            $stock_image->url = $stock_url;
            $stock_image->save();
        } 
        return redirect('/stocks/' . $stock->id);
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
    
    public function show(Stock $stock, StockImage $stockimage)
    {
        $stock_get = StockImage::where('stock_id', '=', $stock->id)->get();
        
        return view('stocks.show')->with(['stock' => $stock, "stock_image" => $stock_get]);
    }
    
    public function delete(Stock $stock)
    {
        $stock->delete();
        return redirect('/stocks/stock');
    }
}