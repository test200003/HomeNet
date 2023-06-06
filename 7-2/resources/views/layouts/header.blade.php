  @yield('header')
  <!DOCTYPE html>
  <html lang="ja">

  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/header.css">
    <meta name="viewport" content="width=device-width">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>header</title>
  </head>

  <body>
    <div class="header">
      <div class="header-logo">
        <a href="{{ route('main.top') }}"><img src="/img/logo.jpg"></a>
      </div>

    </div>

  </body>
