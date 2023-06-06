@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/signup_complete.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>signup_complete</title>
</head>

<body>

  <div class="signup">
    <div class="signup-box">
      <div class="signup-title">
        <p>ユーザー登録完了</p>
      </div>
      <div class="line"></div>
      <div class="signup-text">
        <p>ご登録頂き、ありがとうございました。</p>
        <p>トップ画面より、ログイン画面へお進みください。</p>
      </div>
      <dib class="back-top">
        <p><a href="localhost">トップへ戻る</a></p>
      </dib>
    </div>
  </div>
</body>
@include('layouts.footer')
