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
                @foreach($stock_image as $stock_img)
                    <div class="image">
                        <img src="{{ $stock_img->url }}" alt="画像が読み込めません"/>
                    </div>
                @endforeach
                @foreach ($stocks as $stock)
                    <div class="sotck">
                        <h2 class="name">
                            <a href="/stocks/{{ $stock->id }}">{{ $stock->name }}</a>
                        </h2>
                        <p class="body">{{ $stock->body }}</p>
                        <p class="num">{{ $stock->num }}</p>
                        <p class="price">{{ $stock->price }}</p>
                    </div>
                    @can('admin')
                    <form action="/stocks/{{ $stock->id }}" id="form_{{ $stock->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $stock->id }})">[商品を削除]</button> 
                    </form>
                    @endcan
                    <form action="/stocks/addcart" method="post", enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                        <input type="submit" onclick="addcart()" value="[カートに追加]"/>
                    </form>
                @endforeach
                @can('admin')
                <a href="/stocks/create">商品を追加</a>
                @endcan
            </dvi>
            <div class='paginate'>
                {{ $stocks->links() }}
            </div>
            <script>
                function deletePost(id){
                    'use strict'
                    
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
                
                function addcart() {
                    alert("商品がカートに追加されました。");
                }
            </script>
        </body>
    </html>
</x-app-layout>