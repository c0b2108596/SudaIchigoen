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
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            <div class="content">
                <div class="content__post">
                    <h3>本文</h3>
                    <p>{{ $post->body }}</p>    
                </div>
                <div>
                    @foreach($post_image as $post_img)
                        <img src="{{ $post_img->url }}" alt="画像が読み込めません"/>
                    @endforeach
                </div>
            </div>
            </div>
            @can('admin')
            <div calss="edit">
                <a href="/posts/{{ $post->id }}/edit">edit</a>
            </div>
            @endcan
            <div class="footer">
                <a href="/posts">戻る</a>
            </div>
        </body>
    </html>
</x-app-layout>