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
            <h1 class="text-3xl font-bold mt-10 text-center">商品注文</h1>
            @can('admin')
                <button type="button" class="ml-2 py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="location.href='/posts/create'">商品を追加</button>
            @endcan
                @foreach ($items as $item)
                    <section class="text-gray-600 flex body-font overflow-hidden">
                        <div class="container px-2 flex border-b-2 border-gray-400 py-12 mx-auto">
                            <div class="divide-y-2 divide-gray-100">
                                <div class="py-2 flex flex-wrap md:flex-nowrap">
                                    <div class="md:w-32 md:mb-0 mb-2 flex-shrink-0 flex flex-col">
                                        <img src="{{ $item->ItemImage->url }}" alt="画像が読み込めません"/>
                                        @can('admin')
                                            <form action="/items/{{ $item->id }}" id="form_{{ $item->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="mt-2 ml-2 py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="deletePost({{ $item->id }})">[商品を削除]</button> 
                                            </form>
                                        @endcan
                                    </div>
                                    <div class="md:flex-grow">
                                        <h2 class="text-2xl ml-12 font-bold text-gray-900 title-font mb-2">
                                            <a href="/items/{{ $item->id }}">{{ $item->name }}</a>
                                        </h2>
                                        <p class="text-xl font-bold leading-relaxed ml-12">価格：{{ $item->price }}円</p>
                                        @can('admin')
                                        <p class="text-xl font-bold leading-relaxed ml-12">個数：{{ $item->stock }}個</p>
                                        @endcan
                                        <form action="/items/addcart" method="POST", enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" class="ml-12 py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="addcart()">カートに追加</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </select>
                @endforeach
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