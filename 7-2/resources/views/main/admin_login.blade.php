@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/login.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>admin_login</title>
</head>

<body>
  <div class="login">
    <div class="login-box">
      <div class="login-title">
        <p>管理者用-ログイン</p>
      </div>
      <form action="{{ route('main.admin_login2') }}" method="post" name="form">
        {{ csrf_field() }}
        <div class="line">
        </div>
        <div class="error-msg">
          @if(isset($err))
          {{ $err }}
          @endif
        </div>
        <div class="login-menu">
          <dt><label for="mail">メールアドレス<span>*</span></label></dt>
          <input type="text" name="mail" placeholder="abc123@net.cp.jp" value="{{ old('mail') }}"><br>
        </div>
        <div class="login-menu">
          <dt><label for="password">パスワード<span>*　　</span></label></dt>
          <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}"><br>
        </div>
        <div class="login-menu">
          <button class="login2" name="submit" type="submit">ログイン
          </button>
        </div>
    </div>
  </div>
  </form>
</body>
@include('layouts.footer')
