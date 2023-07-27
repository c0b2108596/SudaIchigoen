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
            <h1 class="text-3xl font-bold mt-10 text-center">お問い合わせ一覧</h1>
            <div class="forms">
                @foreach ($forms as $form)
                    <section class="text-gray-600 flex body-font overflow-hidden">
                        <div class="container px-2 flex border-b-2 border-gray-400 py-12 mx-auto">
                            <div class="-my-2 divide-y-2 divide-gray-100">
                                <div class="py-2 flex flex-wrap md:flex-nowrap">
                                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                      <span class="font-semibold title-font text-gray-700">{{ $form->user->name }}</span>
                                    </div>
                                    <div class="md:flex-grow">
                                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $form->title }}</h2>
                                        <p class="leading-relaxed">{{ $form->body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
        </body>
    </html>
</x-app-layout>