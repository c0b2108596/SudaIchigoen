<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'stock.name' => 'required|string|max:30',
            'stock.body' => 'required|string|max:200',
            'stock.num' => 'required|integer|max:1000',
            'stock.price' => 'required|integer|max:10000',
        ];
    }
}
