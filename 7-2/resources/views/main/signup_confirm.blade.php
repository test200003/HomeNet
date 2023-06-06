@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/signup_confirm.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>signup_confirm</title>
</head>

<body>

  <div class="signup">
    <div class="signup-box">
      <div class="signup-title">
        <p>ユーザー新規登録</p>
      </div>
      <form action="{{ route('main.signup_complete')}}" method="post" name="form">
        {{ csrf_field() }}

        <div class="line">
        </div>
        <div class="signup-text">
          <p>下記の内容をご確認の上送信ボタンを押してください</p>
          <p1>内容を訂正する場合は戻るを押してください。</p1>
        </div>
        <div class="line"></div>
        <div class="signup-menu">
          <div class="confirm-list">
            <h1>ユーザーネーム</h1>
            <p> {{ $username }}</p>
          </div>
        </div>
        <div class="signup-menu">
          <div class="confirm-list">
            <h1>メールアドレス</h1>
            <p>{{ $mail }}</p>
          </div>
        </div>
        <div class="signup-menu">
          <div class="confirm-list">
            <h1>パスワード</h1>
            <p>{{ $password }}</p>
          </div>
        </div>
        <div class="signup-button">
          <button class="signup-complete" name="submit" type="submit">送信
          </button>
          <button class="back-signup" type="button" onclick="history.back()">戻る
          </button>
        </div>
    </div>
  </div>
  </form>

</body>
@include('layouts.footer')
