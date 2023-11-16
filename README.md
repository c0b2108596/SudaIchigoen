<h1 align="center">須田いちご園HP</h1>

##  制作背景
このアプリは，祖父母が営む農園で加工品販売やイベントに参加することに伴い，<br><br>
「お知らせや商品注文をできるホームページがあればよい」と考え制作を決意しました。<br><br>

##  概要
「須田いちご園の㏋」<br>
シンプルなデザインで以下のサービスを提供します。
- お知らせの投稿
- 商品の掲載とカートの追加
- カレンダーを使った休業日やイベントのお知らせ
- マップによって直売所の場所を掲載
- お問い合わせ

<a href="https://suda-ichigoen-a77e59068cd9.herokuapp.com/" target="_blank">アプリへGO</a>

##  開発環境
<b>使用言語・FW：</b><br>
- PHP
- HTML
- CSS(Tailwind CSS)
- JavaScript
- Laravel(ver.9)

<b>環境：</b><br>
- AWS(Cloud9)
- Github

<b>デプロイ：</b><br>
- Heroku

##  データ構成
<b>「テーブル構成・リレーション」</b><br>
<img src="https://github.com/c0b2108596/SudaIchigoen/assets/85694080/11ea8bcf-15b9-4530-91f8-c4e0b167862a" width="450">

##  機能
- CRUD
- ログイン
- 管理者
- カレンダー機能
- マップ機能(Google Maps API)
- 画像アップロード＆表示(Cloudinary)
- お問い合わせ
- カート
- カテゴリー
- 注文機能(Stipe API：テスト環境)

##  こだわり
<b>「直売所の場所が分かりにくい」という実際の意見から生まれたマップ機能</b><br>
Google Maps APIとの外部API連携を用いてマップを表示させています。<br><br>
<img src="https://github.com/c0b2108596/SudaIchigoen/assets/85694080/25406776-8b8a-4ef6-9d3b-1d1e22057106" width="450"><br>
<b>画像の複数投稿</b><br>
リレーションによって1つの投稿に複数の画像を追加できるように工夫しました。<br><br>
<img src="https://github.com/c0b2108596/SudaIchigoen/assets/85694080/29343fca-632f-4d13-b0c6-c8a738a11928" width="450">

##  今後の計画
- 商品評価（いいね）とそれによる投稿並び替え
- ページの読み込み速度の向上
- 投稿の文字検索
- SNSアカウントの掲載