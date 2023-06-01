<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Http\Requests\FormsRequest;

class FormController extends Controller
{
    public function form(Form $form, User $user)
    {
        return view('forms.form')->with(["form" => $form, "user" => $user->get()]);    
    }
    
    public function store(FormsRequest $request, Form $form, User $user)
    {
        $input = $request['form'];
        $input += ['user_id' => $request->user()->id];
        $form->fill($input)->save();
        
        return redirect('/forms/show');
    }
    
    public function show(Form $form)
    {
        return view('forms.show')->with(['form' => $form]);
    }
    
    public function index(Form $form)
    {
        return view('forms.index')->with(['forms' => $form->getPaginateByLimit()]);
    }
}
