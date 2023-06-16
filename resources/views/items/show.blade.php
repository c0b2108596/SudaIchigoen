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
            <h1 class="title">
                {{ $item->name }}
            </h1>
            <div class="content">
                <div class="contet_img">
                    @foreach($item_image as $item_img)
                        <img src="{{ $item_img->url }}" alt="画像が読み込めません"/>
                    @endforeach
                </div>
                <div class="content__body">
                    <h2>内容</h2>
                    <p>{{ $item->body }}</p>    
                </div>
                <div class="content_stock">
                    <h2>在庫</h2>
                    <p>{{ $item->stock }}</p>
                </div>
                <div class="contet_price">
                    <h2>価格</h2>
                    <p>{{ $item->price }}</p>
                </div>
            </div>
            <div calss="edit">
                <a href="/items/{{ $item->id }}/edit">編集</a>
            </div>
            <div class="footer">
                <a href="/items/item">戻る</a>
            </div>
        </body>
    </html>
</x-app-layout>