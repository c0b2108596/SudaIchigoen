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
            <h1 class="text-3xl font-bold my-11 text-gray-800 text-center">～須田いちご農園～</h1>
            <div class="flex justify-center">
                <img class="w-[1000px] h-[500px] my-2" src="https://media.discordapp.net/attachments/868770920788004924/1118792136314327080/IMG_1043.jpg?width=902&height=663"/>
            </div>
            <p class="my-2 text-xl text-center text-gray-600">須田いちご農園のホームページです。</p>
            <p class="my-2 text-xl  text-center text-gray-600">お知らせや販売情報を掲載していくのでチェックお願いします。</p>
            <div>
                <h1 class="text-3xl font-bold my-11 text-gray-800 text-center">～お知らせ一覧～</h1>
                @foreach($posts as $post)
                <div class="border-b-2">
                    <ul>
                        <li class="my-2 ml-12 text-xl text-left border-t-2">
                            <a class="hover:opacity-50" href="/posts/{{ $post->id }}">・{{ $post->title }}</a>
                        </li>
                    </ul>
                @endforeach
                </div>
                <div class="my-2 text-right">
                    <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-500 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" onclick="location.href='/posts'">投稿一覧</button>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>