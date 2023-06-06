<?php
session_start();
?>
@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/login2.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>login_complete</title>
</head>

<body>

  <div class="login">
    <div class="login-box">
      <div class="login-title">
        <p>ログイン完了</p>
      </div>
      <div class="line"></div>
      <div class="login-text">
        <p>ログインしました。</p>
      </div>
      <dib class="main">
        <p><a href="{{ route('main.main') }}">メイン画面へ</a></p>
      </dib>
    </div>
  </div>
</body>
@include('layouts.footer')
