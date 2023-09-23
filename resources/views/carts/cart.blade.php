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
            <h1 class="text-3xl font-bold mt-10 text-center">{{ Auth::user()->name }}様のカート</h1>
            @foreach($data['my_carts'] as $cart)
                <section class="text-gray-600 flex body-font overflow-hidden">
                    <div class="container px-2 flex border-b-2 border-gray-400 py-12 mx-auto">
                        <div class="divide-y-2 divide-gray-100">
                            <div class="py-2 flex flex-wrap md:flex-nowrap">
                                <div class="md:w-32 md:mb-0 mb-2 flex-shrink-0 flex flex-col">
                                    <img src="{{ $cart->item->ItemImage->url }}" alt="画像が読み込めません"/>
                                </div>
                                <div class="md:flex-grow">
                                    <h2 class="text-2xl ml-12 font-bold text-gray-900 title-font mb-2">{{ $cart->item->name }}</h2>
                                    <p class="text-xl font-bold leading-relaxed ml-12">価格：{{ $cart->item->price }}円</p>
                                    <p class="text-xl font-bold leading-relaxed ml-12">個数：{{ $cart->num }}個</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
            <div>
                <p>合計商品数：{{ $data['count'] }}個</p>
                <p>合計金額：{{ $data['sum'] }}円</p>
            </div>
            <div>
                <form class="mx-auto grid max-w-screen-md gap-4 text-bold sm:grid-cols-2" action="/purchase" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name='id' value="{{ Auth::user()->id }}">
                    <input type="hidden" name='sum' value="{{ $data["sum"] }}">
                    <button type="submit">購入</button>
                </form>
            </div>
        </body>
    </html>
</x-app-layout>