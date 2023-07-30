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
            <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
                <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6 lg:gap-x-12">
            　       <div class="lg:col-span-2">
            　           <div class="py-8 lg:pr-4 lg:pr-8">
                            <div class="space-y-5 lg:space-y-8">
                                <h1 class="text-3xl font-bold lg:text-4xl lg:text-5xl dark:text-white">{{ $item->name }}</h1>
                                <p class="text-lg text-gray-800 dark:text-gray-200">{{ $item->body }}</p>
                                <p class="text-lg text-gray-800 dark:text-gray-200">価格：{{ $item->price }}円</p>
                                @can('admin')
                                <p class="text-lg text-gray-800 dark:text-gray-200">在庫数：{{ $item->stock }}個</p>
                                @endcan
                                <div class="text-center">
                                    <div class="grid lg:grid-cols-2 gap-3">
                                        <div class="grid grid-cols-2 lg:grid-cols-1 gap-3">
                                            @foreach($item_image as $item_img)
                                                <figure class="relative w-full h-60">
                                                    <img src="{{ $item_img->url }}" alt="画像が読み込めません"/>
                                                </figure>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-20 text-center mx-auto max-w-screen-2xl px-4 md:px-8 md:mt-24">
                <div class="sm:col-span-2">
                    <button type="submit" class="py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="location.href='/posts'">戻る</button>
                    @can('admin')
                    <button type="submit" class="py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="location.href='/posts/{{ $item->id }}/edit'">投稿を編集</button>
                    @endcan
                </div>
            </div>
        </body>
    </html>
</x-app-layout>