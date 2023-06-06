@include('layouts.header')
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/con_complete.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>con_complete</title>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.2.1/font-awesome-animation.css" type="text/css" media="all" />

</head>

<body>
  <div class="username">
    <a href="{{ route('main.update') }}">{{ $customer->username }}さん</a>
  </div>
  <div class="complete">

    <span class="fas fa-check-circle size fa-10x faa-tada animated-hover"></span>
    <div class="title">
      <p>お申し込みが完了しました。</p>
    </div>
    <dib class="back-top">
      <p><a href="localhost">トップへ戻る</a></p>
    </dib>
  </div>

</body>
@include('layouts.footer')
