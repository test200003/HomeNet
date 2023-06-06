<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./form.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(function() {
      $('.login').hide();
      $(document).click(function() {
        var val = $(event.target).closest('.jump-form').length;
        if (val) {
          $('.login').show();
        } else {
          $('.login').hide();
        };
      });

      $(".jump-form").click(function() {
        $(".login").toggleClass('scrollin');
      });
    });
  </script>
  <title>footer</title>
</head>
</body>
<div class="login">
  <div class="login-menu">
    <div class="login-title">
      <p>ログイン</p>
      <div class="line">
      </div>
    </div>
    <form action method="post">
      <div class="login-box">
        <input type="text" name="mail" placeholder="メールアドレス"><br>
      </div>
      <div class="login-box">
        <input type="text" name="password" placeholder="パスワード"><br>
      </div>
      <div class="login-box">
        <button class="form_button" type="button">送信</button>
      </div>
    </form>
    <div class="line"></div>
    <div class="login-box">
      <div class="logo">
        <img src="./img/twitter.png">
      </div>
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="./img/fb.png">
      </div>
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="./img/google.png">
      </div>
    </div>
    <div class="login-box">
      <div class="logo">
        <img src="./img/apple.png">
      </div>
    </div>
  </div>
</div>


</html>
