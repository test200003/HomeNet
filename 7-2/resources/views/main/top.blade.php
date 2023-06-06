@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/top.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>top</title>
</head>

<body>

  <div class="top">
    <img src="./img/laptop-g914ad6154_1920.jpg">
  </div>
  <div class="top-text">
    <p>あなたにピッタリのネットを見つけよう！</p>
  </div>
  <div class="jump-button">
    <div class="button">
      <a href="{{ route('main.signup') }}">新規登録</a>
    </div>
    <div class="button">
      <a href="{{ url('login1') }}">ログイン</a>
    </div>
  </div>
  @include('layouts.footer')

</body>
