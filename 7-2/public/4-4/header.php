<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./header.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(function() {
      $(window).on('scroll', function() {
        if ($('.box1').height() < $(this).scrollTop()) {
          $('.header').addClass('scroll-nav');
        } else {
          $('.header').removeClass('scroll-nav');
        }
      });

      $(".jump1").click(function() {
        $('html, body').animate({
          scrollTop: 700
        }, 500);
      });
      $(".jump2").click(function() {
        $('html, body').animate({
          scrollTop: 2050
        }, 500);
      });
      $('.menubtn').on('click', function() {
        $('.splist').toggleClass('splist-active');
        $(this).toggleClass('close');
      });
    });
  </script>
  <title>header</title>
</head>

<body>
  <div class="header">
    <div class="header-list">
      <div id="header-logo">
        <a href="4-4.php"><img src="img/logo.png"></a>
      </div>
      <div class="header-text1">
        <h1 class="jump1">はじめに</h1>
        <h1 class="jump2">体験</h1>
        <h1 class="jump-contact"><a href="./contact.php">お問い合わせ</a></h1>
      </div>
      <div class="header-text2">
        <h1 class="jump-form">サインイン</h1>
      </div>

      <div class="spmenu">
        <div>
          <img class="menubtn" src="./img/menu.png">
        </div>
        <div class="splist" id='none'>
          <div class="jump-form">サインイン</div>
          <div class="spline"></div>
          <div class="jump1">はじめに</div>
          <div class="jump2"><a>体験</a></div>
          <div class="jump-contact"><a href='./contact.php'>お問い合わせ</a></div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
