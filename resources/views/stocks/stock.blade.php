<x-app-layout>
    <x-slot name="header">
        SudaIchigoen
    </x-slot>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>商品注文画面</title>
        </head>
        <body>
            <h1>商品名</h1>
            <dvi class="stocks">
                @foreach ($stocks as $stock)
                    <div class="sotck">
                        <h2 class="title">{{ $stock->title }}</h2>
                        <p class="body">{{ $stock->body  }}</p>
                        <p class="num">{{ $stock->num  }}</p>
                        <p class="price">{{ $stock->price  }}</p>
                    </div>
                @endforeach
                <a href="/stocks/create">商品を追加</a>
            </dvi>
            <div class='paginate'>
                {{ $stocks->links() }}
            </div>
        </body>
    </html>
</x-app-layout>