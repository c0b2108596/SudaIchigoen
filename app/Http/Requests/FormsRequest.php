<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'form.title' => 'required|string|max:30',
            'form.body' => 'required|string|max:500',
        ];
    }
}
