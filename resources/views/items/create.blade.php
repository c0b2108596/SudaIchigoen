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
            <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
                <h1 class="text-3xl font-bold mt-10 text-center">投稿を作成</h1>
                <form class="mx-auto grid max-w-screen-md gap-4 text-bold sm:grid-cols-2" action="/items" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-2">
                        <label for="message" class="text-xl mb-2 inline-block text-bold text-sm sm:text-base">商品名</label>
                        <input type="text" name="item[name]" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"  placeholder="タイトル" value="{{ old('item.name') }}"/>
                        <p class="name_error" style="color:red">{{ $errors->first('item.name') }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="text-xl mb-2 inline-block text-bold text-sm sm:text-base">商品説明</label>
                        <textarea name="item[body]" class="h-96 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" placeholder="商品説明を記述してください。">{{ old('item.body') }}</textarea>
                        <p class="body_error" style="color:red">{{ $errors->first('item.body') }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="text-xl mb-2 inline-block text-bold text-sm sm:text-base">在庫数</label>
                        <input type="text" name="item[stock]" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" placeholder="在庫数" value="{{ old('item.stock') }}"/>
                        <p class="stock_error" style="color:red">{{ $errors->first('item.stock') }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="text-xl mb-2 inline-block text-bold text-sm sm:text-base">値段</label>
                        <input type="text" name="item[price]" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" placeholder="価格"/ value="{{ old('item.price') }}">
                        <p class="price_error" style="color:red">{{ $errors->first('item.price') }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <input type="file" name="image[]" multiple>
                    </div>
                    <div class="py-2 flex flex-wrap md:flex-nowrap">
                        <div class="md:w-32 md:mb-0 mb-2 flex-shrink-0 flex flex-col">
                            <button type="submit" class="py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="posts()">投稿</button>
                        </div>
                    </div>
                </form>
                <button type="submit" class="py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="location.href='/posts'">戻る</button>
            </div>
            <script>
                function post() {
                    alert("投稿が保存されました。");
                }
            </script>
        </body>
    </html>
</x-app-layout>
