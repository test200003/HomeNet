@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/update.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>con_confirm</title>
</head>

<div class="username">
  <p>{{ $customer->username }}</p>
</div>

<body>

  <div class="signup">
    <div class="signup-box">
      <div class="signup-title">
        <p>アカウント編集</p>
      </div>
      <form action="{{ route('main.update_com') }}" method="post" name="form">
        {{ csrf_field() }}
        <div class="line">
        </div>
        <div class="error-msg">
          @error('username')
          {{ $message }}
          @enderror
        </div>
        <div class="signup-menu">
          <dt><label for="username">ユーザーネーム<span>*</span></label></dt>
          <input type="text" name="username" placeholder="ヤマダ" value=""><br>
        </div>
        <div class="error-msg">
          @error('mail')
          {{ $message }}
          @enderror
        </div>
        <div class="signup-menu">
          <dt><label for="mail">メールアドレス<span>*</span></label></dt>
          <input type="text" name="mail" placeholder="abc123@net.cp.jp" value="{{ old('mail') }}"><br>
        </div>
        <div class="error-msg">
          @error('password')
          {{ $message }}
          @enderror
        </div>
        <div class="signup-menu">
          <dt><label for="password">パスワード<span>*　　</span></label></dt>
          <input type="password" name="password" placeholder="パスワード" value="{{ old('password') }}"><br>
        </div>
        <div class="signup-menu">
          <button class="signup_confirm" name="submit" type="submit">更新する
          </button>
        </div>
        <div class="delete">
          <a href="{{ route('main.delete') }}" onclick="return confirm('本当に削除しても良いですか？')">このアカウントを削除する
          </a>
        </div>

    </div>
  </div>
  </form>
</body>
