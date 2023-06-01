<x-app-layout>
    <x-slot name="header">
        SudaIchigoen
    </x-slot>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>お問い合わせフォーム</title>
        </head>
        <body>
            <h1>お問い合わせフォーム</h1>
            <form action="/forms" method="POST">
                @csrf
                <div class="title">
                    <h2>件名</h2>
                    <input type="text" name="form[title]" placeholder="件名" value"{{ old('form.title') }}"/>
                    <p class="title_error" style="color:red">{{ $errors->first('form.title') }}</p>
                </div>
                <div class="body">
                    <h2>内容</h2>
                    <textarea name="form[body]" placeholder="内容を入力してください。">{{ old('form.body') }}</textarea>
                    <p class="body_error" style="color:red">{{ $errors->first('form.body') }}</p>
                </div>
                <input type="submit" value="保存"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </body>
    </html>
</x-app-layout>