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
    	    <div>
    		    @foreach ($posts as $post)
    		    	<div class="border-t-2 flex justify-between">
    		    	    <div class="ml-2 my-2 hover:opacity-50 text-3xl">
                            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                        </div>
                        <div>
                            <a class="my-2 mr-2 py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-red-800" href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        </div>
                    </div>
    		    	@can('admin')
    		    	<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="ml-2 py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"  onclick="deletePost({{ $post->id }})">削除</button> 
                    </form>
                    @endcan
    		    @endforeach
    		    @can('admin')
                    <a href="/posts/create">投稿を作成</a>
                @endcan
        	    </div>
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