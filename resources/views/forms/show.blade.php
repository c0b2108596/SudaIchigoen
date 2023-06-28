<x-app-layout>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>お問い合わせフォーム</title>
        </head>
        <body>
            <h1>お問い合わせが送信されました。</h1>
            <a href="/forms/form">戻る</a>
        </body>
    </html>
</x-app-layout>