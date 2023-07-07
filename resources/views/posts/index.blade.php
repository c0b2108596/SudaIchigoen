<x-app-layout>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>PostCreate</title>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        </head>
        <body>
            @can('admin')
            <a href="/posts/create">投稿を作成</a>
            @endcan
    	    <div class='max-w-screen-xl px-4 mx-auto md:px-8'>
    		    @foreach ($posts as $post)
    		    	<ul>
    		    	    <li class="border-2">
                            <a class="text-3xl flex justify-center " href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            <a class="" href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        </li>
                    </ul>
    		    	@can('admin')
    		    	<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                    @endcan
    		    @endforeach
    	    </div>
            <div class='paginate'>
                {{ $posts->links() }}
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