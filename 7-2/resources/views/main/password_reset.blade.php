@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/password_reset.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>password_reset</title>
</head>

<body>
  <div class="password">
    <div class="password-box">
      <div class="password-title">
        <p>パスワードをお忘れの方</p>
      </div>
      <form action="{{ route('main.reset_com') }}" method="post" name="form">
        {{ csrf_field() }}
        <div class="line">
        </div>
        <div class="password-text">
          <p>アカウント登録時に使用したメールアドレスを入力してください。</p>
        </div>
        <div class="error-msg">
          @if(isset($err))
          {{ $err }}
          @endif
        </div>
        <div class="password-menu">
          <dt><label for="mail">メールアドレス<span>*</span></label></dt>
          <input type="text" name="mail" placeholder="abc123@net.cp.jp" value="{{ old('mail') }}"><br>
        </div>
        <div class="line"></div>
        <div class="password-text">
          <p>新しいパスワードを入力してください。</p>
        </div>
        <div class="error-msg">
          @error('password')
          {{ $message }}
          @enderror
        </div>
        <div class="password-menu">
          <dt><label for="password">パスワード<span>*　　</span></label></dt>
          <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}"><br>
        </div>

        <div class="password-menu">
          <button class="reset" name="submit" type="submit">更新
          </button>
        </div>

    </div>
  </div>
  </form>
</body>
@include('layouts.footer')
