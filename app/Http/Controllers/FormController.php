<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use App\Http\Requests\FormsRequest;

class FormController extends Controller
{
    public function form(Form $form, User $user) //投稿フォームの閲覧
    {
        return view('forms.form')->with(["form" => $form, "user" => $user->get()]);    
    }
    
    public function store(FormsRequest $request, Form $form, User $user) //フォームの内容を保存する
    {
        $input = $request['form'];
        $input += ['user_id' => $request->user()->id];
        $form->fill($input)->save();
        
        return redirect('/forms/show');
    }
    
    public function show(Form $form) //投稿が送られた時あとの遷移画面
    {
        
        return view('forms.show')->with(['form' => $form]);
    }
    
    public function index(Form $form) //送られたフォームを見る(管理者用)
    {
        Gate::authorize('admin');
        
        return view('forms.index')->with(['forms' => $form->getPaginateByLimit()]);
    }
}
