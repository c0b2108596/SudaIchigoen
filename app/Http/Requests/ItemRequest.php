<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'item.name' => 'required|string|max:30',
            'item.body' => 'required|string|max:200',
            'item.stock' => 'required|integer|max:1000',
            'item.price' => 'required|integer|max:10000',
        ];
    }
}
