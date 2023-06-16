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
            <dvi class="items">
                @foreach($item_image as $item_img)
                    <div class="image">
                        <img src="{{ $item_img->url }}" alt="画像が読み込めません"/>
                    </div>
                @endforeach
                @foreach ($items as $item)
                    <div class="item">
                        <h2 class="name">
                            <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
                        </h2>
                        <p class="body">{{ $item->body }}</p>
                        <p class="stock">{{ $item->stock }}</p>
                        <p class="price">{{ $item->price }}</p>
                    </div>
                    @can('admin')
                    <form action="/items/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $item->id }})">[商品を削除]</button> 
                    </form>
                    @endcan
                    <form action="/items/addcart" method="POST", enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <input type="submit" onclick="addcart()" value="[カートに追加]"/>
                    </form>
                @endforeach
                @can('admin')
                <a href="/items/create">商品を追加</a>
                @endcan
            </dvi>
            <div class='paginate'>
                {{ $items->links() }}
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