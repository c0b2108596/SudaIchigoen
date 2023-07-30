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
            <h1 class="text-3xl font-bold mt-10 text-center">お知らせ一覧</h1>
            @can('admin')
                <button type="button" class="ml-2 py-2 px-3 items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="location.href='/posts/create'">新規投稿を作成</button>
            @endcan
            @foreach ($posts as $post)
                    <section class="text-gray-600 flex body-font overflow-hidden">
                        <div class="container px-2 flex border-b-2 border-gray-400 py-12 mx-auto">
                            <div class="divide-y-2 divide-gray-100">
                                <div class="py-2 flex flex-wrap md:flex-nowrap">
                                    <div class="md:w-32 md:mb-0 mb-2 flex-shrink-0 flex flex-col">
                                        <a class="font-semibold title-font my-2 mr-2 py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-red-800" href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                                        @can('admin')
                        		    	<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="ml-2 py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"  onclick="deletePost({{ $post->id }})">削除</button> 
                                        </form>
                                        @endcan
                                    </div>
                                    <div class="md:flex-grow">
                                        <a class="text-2xl ml-12 font-bold text-gray-900 title-font mb-2 hover:opacity-50" href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                                        <p class="leading-relaxed ml-12">{{ $post->body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            @endforeach
            <div class='paginate'>
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
            <script>
            function deletePost(id) {
                'use strict'
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
            </script>
        </body>
    </html>
</x-app-layout>