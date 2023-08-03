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
            <h1 class="text-3xl font-bold my-10 text-center">須田いちご園マップ</h1>
            <div class="flex">
                <div class="pl-10 w-1/2 mb:w-full h-[500px]" id="map"></div>
                <script>
                function initMap() {
                map = document.getElementById("map");
            
                // 東京タワーの緯度、経度を変数に入れる
                let sudaichigoen = {lat: 37.2364229, lng: 140.3822403};
                // オプションの設定
                opt = {
                // 地図の縮尺を指定
                zoom: 16,
                // センターを須田いちご園に指定
                center: sudaichigoen,
                };
                // 地図のインスタンスを作成（第一引数にはマップを描画する領域、第二引数にはオプションを指定）
                mapObj = new google.maps.Map(map, opt);
                marker = new google.maps.Marker({
                // ピンを差す位置を須田いちご園に設定
                position: sudaichigoen,
                // ピンを差すマップを指定
                map: mapObj,
                // ホバーしたときに「須田いちご園」と表示されるように指定
                title: '須田いちご園',
                });
                }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key={{ $api_key }}&callback=initMap"></script>
                <div class="mt-48 ml-12">
                    <h2 class="text-2xl px-40 py-4 font-bold text-gray-600">須田いちご園</h2>
                    <p class="text-xl py-2 font-bold text-gray-600">〒：969-0402</p>
                    <p class="text-xl py-2 font-bold text-gray-600">住所：福島県岩瀬郡鏡石町成田148番地</p>
                    <P class="text-xl py-2 font-bold text-gray-600">電話番号：024-862-2966</P>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>