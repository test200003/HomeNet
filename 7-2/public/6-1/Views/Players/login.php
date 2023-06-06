<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');

?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オブジェクト指向 - ログイン</title>
  <link rel="stylesheet" type="text/css" href="/css/user.css">

</head>

<body>
  <div class="login">
    <div class="box">
      <div class="title">
        <p>ログイン</p>
      </div>
      <div class="line"></div>
      <form action="login2.php" method="post">
        <div class="menu2">
          <div class="errmsg"> <?php echo isset($_SESSION['errMessage']['errlogin']) ? $_SESSION['errMessage']['errlogin'] : ''
                                ?></div>
          <dt><label for="email">メールアドレス</label></dt>
          <input type="text" name="email" value="" placeholder="メールアドレス">
        </div>
        <div class="menu2">
          <dt><label for="password">パスワード</label></dt>
          <input type="password" name="password" value="" placeholder="パスワード">
        </div>
        <div class="menu2">
          <button type="submit" name="submit">ログイン</button>
          <a href="index.php">トップへ戻る</a>

        </div>
      </form>
    </div>
  </div>



</body>

</html>
