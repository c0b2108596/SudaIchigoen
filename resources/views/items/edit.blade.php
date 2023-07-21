<x-app-layout>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Posts</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Kaisei+HarunoUmi:wght@700&display=swap" rel="stylesheet">
        </head>
        <body>
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/items/{{ $item->id }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="content__name">
                        <h2>商品名</h2>
                        <input type="text" name="item[name]" value="{{ $item->name }}">
                    </div>
                    <div calss="content__body">
                        <h2>内容</h2>
                        <input type="text" name="item[body]" value="{{ $item->body }}">
                    </div>
                    <div class="conten_stock">
                        <h2>在庫数</h2>
                        <input type="text" name="item[stock]" value="{{ $item->stock }}">
                    </div>
                    <div class="conten_price">
                        <h2>価格</h2>
                        <input type="text" name="item[price]" value="{{ $item->price }}">
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
            <div class="back">[<a href="/">back</a>]</div>
        </body>
    </html>
</x-app-layout>