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
            <h1>お問い合わせ一覧</h1>
            <div class="forms">
                @foreach ($forms as $form)
                    <div class="form">
                        <h2 class='title'>{{ $form->title }}</h2>
                        <p class="name">{{ $form->user->name }}</p>
                        <p class='body'>{{ $form->body }}</p>
                    </div>
                @endforeach
            </div>
        </body>
    </html>
</x-app-layout>