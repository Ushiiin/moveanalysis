<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> これは古いコマンド-->
    <!-- @vite('resources/js/app.js') viteから持ってくる場合 -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <h1 class="text-xl text-center mx-auto">Introduction Page</h1>
    <div class="text-center py-2">
        <h2 class="font-bold">説明</h2>
        <p>このサイトはGoogle timelineで取得できるJSONファイルから移動の種類・距離を取り出して表示するサイトです。</p>
    </div>
    <div class="text-center py-2">
        <x-button class="bg-orange-700"><a href="./login">Login</a></x-button>
        　　　
        <x-button class="bg-orange-700"><a href="./register">Register</a></x-button>
    </div>
    <h3>免責事項</h3>
    <p>当サイトが取得する情報は日時、移動距離、移動種類のみであり、その他の個人情報は取得しておりません。</p>
    <p>当サイト、またはコンテンツのご利用により、万一、ご利用者様に何らかの不都合や損害が発生したとしても、当サイトは何らの責任を負うものではありません。</p>
</body>
</html>
