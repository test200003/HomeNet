@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/con_confirm.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>con_confirm</title>
</head>
<div class="username">
  <a href="{{ route('main.update') }}">{{ $customer->username }}さん</a>
</div>

<body>

  <div class="confirm">
    <div class="confirm-box">
      <div class="confirm-title">
        <p>入力内容確認</p>
      </div>
      <div class="line"></div>
      <form action="{{ route('main.con_complete') }}" method="post" name="form">
        {{ csrf_field() }}

        <div class="confirm-text">
          <p>下記の内容をご確認の上送信ボタンを押してください</p>
          <p1>内容を訂正する場合は戻るを押してください。</p1>
        </div>
        <div class="confirm-list">
          <h1>氏名</h1>
          <p>{{ $name }} </p>
        </div>
        <div class="confirm-list">
          <h1>電話番号</h1>
          <p>{{ $tel }} </p>
        </div>
        <div class="confirm-list">
          <h1>郵便番号</h1>
          <p>{{ $post }}</p>
        </div>
        <div class="confirm-list">
          <h1>設置先住所</h1>
          <p>{{ $address }}</p>
        </div>
        <div class="confirm-list">
          <h1>住居タイプ</h1>
          <p> {{ $type }}</p>
        </div>
        <div class="confirm-button">
          <button class="jump-complete" name="submit" type="submit">送信
          </button>
      </form>
      <button class="back-contact" type="button" onclick="history.back()">戻る
      </button>
    </div>
    </form>
  </div>


</body>
@include('layouts.footer')
