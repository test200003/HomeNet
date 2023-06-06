<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$users = new PlayerController();
$params = $users->login();
$params = $_SESSION['params'];
$_SESSION['email'] = $params['email'];
$_SESSION['password'] = $params['password'];
$_SESSION['country_id'] = $params['country_id'];

/*
if (isset($_POST['login'])) {
  if ($_SESSION['role'] == 1) {
    header('Location:index.php');
  } else {
    header('Location:normalindex.php');
    exit();
  }
}
*/
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
  <?php
  $err = [];
  $_SESSION['errMessage'] = '';
  $_SESSION['role'] = $params['role'];

  if ((password_verify($_POST['password'], $params['password']))) {
    $_SESSION['email'] = $params['email'];
  } else {
    $err['errlogin'] = 'メールアドレスまたはパスワードが間違っています。';
  }
  /*
  if ($_SESSION['email'] == 'admin@cmail.com') {
    $users->admin();
  }
  */
  if (count($err) > 0) {
    $_SESSION['errMessage'] = $err;
    header('Location:./login.php');
  }
  ?>

  <div class="signup">
    <div class="box">
      <div class="title">
        <p>ログイン</p>
      </div>
      <div class="line"></div>
      <div class="signtext">
        <p>ログインしました。</p>
        <!--
        <form action="" method="POST">
          <th><button class="loginbtn" type="submit">トップへ戻る</button>
            <input type="hidden" name='login'>
-->
        <?php
        if (isset($_SESSION['role'])) {
          if ($_SESSION['role'] == 0) {
            $normal = 0;
          } elseif ($_SESSION['role'] == 1) {
            $admin = 1;
          }
        }
        ?>
        <a href="index.php">トップへ戻る</a>
        <!--
        <?php if (isset($normal)) : ?>
          <a href="normalindex.php">トップへ戻る</a>
        <?php endif; ?>
        -->
        </form>
      </div>
    </div>


</body>

</html>
