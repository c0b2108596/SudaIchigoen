<x-app-layout>
    <x-slot name="header">
        SudaIchigoen
    </x-slot>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>Blog</title>
        </head>
        <body>
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/stocks/{{ $stock->id }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="content__name">
                        <h2>商品名</h2>
                        <input type="text" name="stock[name]" value="{{ $stock->name }}">
                    </div>
                    <div calss="content__body">
                        <h2>内容</h2>
                        <input type="text" name="stock[body]" value="{{ $stock->body }}">
                    </div>
                    <div class="conten_num">
                        <h2>在庫数</h2>
                        <input type="text" name="stock[num]" value="{{ $stock->num }}">
                    </div>
                    <div class="conten_price">
                        <h2>価格</h2>
                        <input type="text" name="stock[price]" value="{{ $stock->price }}">
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
            <div class="back">[<a href="/">back</a>]</div>
        </body>
    </html>
</x-app-layout>