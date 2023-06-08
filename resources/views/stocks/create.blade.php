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
            <form action="/stocks" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="name">
                    <h2>商品名</h2>
                    <input type="text" name="stock[name]" placeholder="タイトル" value="{{ old('stock.name') }}"/>
                    <p class="name_error" style="color:red">{{ $errors->first('stock.name') }}</p>
                </div>
                <div class="body">
                    <h2>商品説明</h2>
                    <textarea name="stock[body]" placeholder="今日も1日お疲れさまでした。">{{ old('stock.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('stock.body') }}</p>
                </div>
                <div class="num">
                    <h2>在庫数</h2>
                    <input type="text" name="stock[num]" placeholder="在庫数" value="{{ old('stock.num') }}"/>
                    <p class="num_error" style="color:red">{{ $errors->first('stock.num') }}</p>
                </div>
                <div class="price">
                    <h2>価格</h2>
                    <input type="text" name="stock[price]" placeholder="価格"/ value="{{ old('stock.price') }}">
                    <p class="price_error" style="color:red">{{ $errors->first('stock.price') }}</p>
                </div>
                <div class="image">
                    <input type="file" name="image[]" multiple>
                </div>
                <input type="submit" value="保存"/>
            </form>
        </body>
        <div class="footer">
                <a href="/">戻る</a>
        </div>
    </html>
</x-app-layout>
