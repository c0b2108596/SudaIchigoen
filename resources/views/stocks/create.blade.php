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
            <form action="/stocks" method="POST">
                @csrf
                <div class="name">
                    <h2>商品名</h2>
                    <input type="text" name="stock[name]" placeholder="タイトル"/>
                </div>
                <div class="body">
                    <h2>商品説明</h2>
                    <textarea name="stock[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
                </div>
                <div class="num">
                    <h2>在庫数</h2>
                    <input type="text" name="stock[num]" placeholder="在庫数"/>
                </div>
                <div class="price">
                    <h2>価格</h2>
                    <input type="text" name="stock[price]" placeholder="価格"/>
                </div>
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </html>
</x-app-layout>
