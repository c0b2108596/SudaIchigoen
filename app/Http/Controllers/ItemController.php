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
    public function item(Item $item, ItemImage $item_img)
    {   
        $img_gets = ItemImage::where('item_id', '=', $item->id)->get();
        
        return view('items.item')->with(['items' => $item->getPaginateByLimit(), "item_image" => $img_gets]);
    }
    
    public function create(Item $item)
    {
        Gate::authorize('admin');

        
        return view('items.create');
    }
    
    public function store(ItemRequest $request, Item $item)
    {  
        Gate::authorize('admin');
        
        $images = $request->file('image');
        $input_item = $request['item'];
        $item->fill($input_item)->save();
        
       foreach($images as $image)
        {   
            $item_url = Cloudinary::upload($image->getRealpath())->getSecurePath();
            $item_image = New ItemImage();
            $item_image->item_id = $item->id;
            $item_image->url = $item_url;
            $item_image->save();
        } 
        return redirect('/items/' . $item->id);
    }
    
    public function edit(Item $item)
    {
        Gate::authorize('admin');
        
        return view('items.edit')->with(['item' => $item]);
    }
    
    public function update(ItemRequest $request, Item $item)
    {
        Gate::authorize('admin');
        
        $input_item = $request['item'];
        $item->fill($input_item)->save();
        
        return redirect('/items/' . $item->id);
    }
    
    public function show(Item $item, ItemImage $itemimage)
    {
        $item_get = ItemImage::where('item_id', '=', $item->id)->get();
        
        return view('items.show')->with(['item' => $item, "item_image" => $item_get]);
    }
    
    public function delete(Item $item)
    {
        Gate::authorize('admin');
        
        $item->delete();
        return redirect('/items/item');
    }
}
