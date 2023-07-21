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
            <h1 class="title">編集画面</h1>
            <div class="content">
                <form action="/posts/{{ $post->id }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="content__title">
                        <h2>タイトル</h2>
                        <input type="text" name="post[title]" value="{{ $post->title }}">
                    </div>
                    <div calss="content__body">
                        <h2>本文</h2>
                        <input type="text" name="post[body]" value="{{ $post->body }}">
                    </div>
                    <input type="submit" value="保存">
                </form>
            </div>
            <div class="back">[<a href="/posts">back</a>]</div>
        </body>
    </html>
</x-app-layout>