<x-app-layout>
    <!DOCTYPE HTML>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Posts</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <h1>須田いちご園マップ</h1>
             <div id="map" style="height:500px"></div>
             <script>
                 function initMap() {
                 map = document.getElementById("map");
                
                 // 東京タワーの緯度、経度を変数に入れる
                 let sudaichigoen = {lat: 37.2364229, lng: 140.3822403};
                 // オプションの設定
                 opt = {
                 // 地図の縮尺を指定
                 zoom: 13,
                 // センターを東京タワーに指定
                 center: sudaichigoen,
                 };
                 // 地図のインスタンスを作成（第一引数にはマップを描画する領域、第二引数にはオプションを指定）
                 mapObj = new google.maps.Map(map, opt);
                 marker = new google.maps.Marker({
                 // ピンを差す位置を東京タワーに設定
                 position: sudaichigoen,
                 // ピンを差すマップを指定
                 map: mapObj,
                 // ホバーしたときに「tokyotower」と表示されるように指定
                 title: '須田いちご園',
                 });
                 }
             </script>
             
             <script src="https://maps.googleapis.com/maps/api/js?key={{ $api_key }}&callback=initMap"></script>
             
        </body>
    </html>
</x-app-layout>