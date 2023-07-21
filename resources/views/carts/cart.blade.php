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
            <h1 class="name">
                {{ Auth::user()->name }}様のカート
            </h1>
            <div class="content">
                @foreach($carts as $cart)
                    <div class="content_name">
                        <h2>商品名</h2>
                        <p>{{ $cart->item->name }}</p>
                    </div>
                    <div class="content__body">
                        <h3>内容</h3>
                        <p>{{ $cart->item->title }}</p>    
                    </div>
                    <div class="contet_price">
                        <h3>価格</h3>
                        <p>{{ $cart->item->price }}円</p>
                    </div>
                    <div class="content_num)">
                        <h3>注文数</3>
                        <p>{{ $cart->num }}</p>
                    </div>
                @endforeach
            </div>
        </body>
    </html>
</x-app-layout>