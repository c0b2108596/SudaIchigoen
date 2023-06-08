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
                {{ $stock->name }}
            </h1>
            <div class="content">
                <div class="content__body">
                    <h2>内容</h2>
                    <p>{{ $stock->body }}</p>    
                </div>
                <div class="content_num">
                    <h2>在庫</h2>
                    <p>{{ $stock->num }}</p>
                </div>
                <div class="contet_price">
                    <h2>価格</h2>
                    <p>{{ $stock->price }}</p>
                </div>
                <div class="contet_img">
                    @foreach($stock_image as $stock_img)
                        <img src="{{ $stock_img->url }}" alt="画像が読み込めません"/>
                    @endforeach
                </div>
            </div>
            <div calss="edit">
                <a href="/stocks/{{ $stock->id }}/edit">編集</a>
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </html>
</x-app-layout>