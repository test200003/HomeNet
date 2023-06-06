@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/update.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>update_complete</title>
</head>
<div class="username">
  <p>{{ $customer->username }}</p>
</div>


<body>

  <div class="signup">
    <div class="signup-box">
      <div class="signup-title">
        <p>アカウント編集完了</p>
      </div>
      <div class="line"></div>
      <div class="signup-text">
        <p>アカウント情報を更新しました。
        </p>
        <p>トップ画面より、再度ログインしてください。</p>

      </div>
      <dib class="back-top">
        <p><a href="localhost">トップへ戻る</a></p>
      </dib>
    </div>
  </div>
</body>
@include('layouts.footer')
