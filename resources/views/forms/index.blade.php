<x-app-layout>
    <x-slot name="header">
        SudaIchigoen
    </x-slot>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>PostCreate</title>
        </head>
        <body>
            <h1>お問い合わせ一覧</h1>
            <div class="forms">
                @foreach ($forms as $form)
                    <div class="form">
                        <h2 class='title'>{{ $form->title }}</h2>
                        <p class='body'>{{ $form->body }}</p>
                    </div>
                @endforeach
            </div>
        </body>
    </html>
</x-app-layout>