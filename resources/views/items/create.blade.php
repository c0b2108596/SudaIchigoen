<x-app-layout>
    <x-slot name="header">
        SudaIchigoen
    </x-slot>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>PostCreate</title>
        </head>
        <body>
            <h1>Blog Name</h1>
            <form action="/items" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name">
                    <h2>商品名</h2>
                    <input type="text" name="item[name]" placeholder="タイトル" value="{{ old('item.name') }}"/>
                    <p class="name_error" style="color:red">{{ $errors->first('item.name') }}</p>
                </div>
                <div class="body">
                    <h2>商品説明</h2>
                    <textarea name="item[body]" placeholder="今日も1日お疲れさまでした。">{{ old('item.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('item.body') }}</p>
                </div>
                <div class="stock">
                    <h2>在庫数</h2>
                    <input type="text" name="item[stock]" placeholder="在庫数" value="{{ old('item.stock') }}"/>
                    <p class="stock_error" style="color:red">{{ $errors->first('item.stock') }}</p>
                </div>
                <div class="price">
                    <h2>価格</h2>
                    <input type="text" name="item[price]" placeholder="価格"/ value="{{ old('item.price') }}">
                    <p class="price_error" style="color:red">{{ $errors->first('item.price') }}</p>
                </div>
                <div class="image">
                    <input type="file" name="image[]" multiple>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="footer">
                <a href="/items/item">戻る</a>
            </div>
        </body>
    </html>
</x-app-layout>
