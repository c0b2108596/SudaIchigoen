<x-app-layout>
    <x-slot name="header">
        SudaIchigoen
    </x-slot>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Posts</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1 class="name">
                {{ Auth::user()->name }}様のカート
            </h1>
            <div class="content">
                @foreach($carts as $cart)
                    @foreach($cart->stocks as $stock)
                        <div class="content_name">
                            <h2>商品名</h2>
                            <p>{{ $stock->name }}</p>
                        </div>
                        <div class="content__body">
                            <h3>内容</h3>
                            <p>{{ $stock->title }}</p>    
                        </div>
                        <div class="contet_price">
                            <h3>価格</h3>
                            <p>{{ $stock->price }}円</p>
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="cart_total">
                <h2>商品合計：{{ $data["count"] }}点</h2>
                
            </div>
        </body>
    </html>
</x-app-layout>