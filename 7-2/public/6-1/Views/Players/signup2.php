<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$users = new PlayerController();
$params = $users->checkemail();
$params = $_SESSION['params'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オブジェクト指向 - 新規登録</title>
  <link rel="stylesheet" type="text/css" href="/css/user.css">

</head>

<body>

  <?php
  $err = [];
  $_SESSION['errMessage'] = '';

  if (empty($_POST['email']) || !preg_match('/^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]+.[A-Za-z0-9]+$/', $_POST['email'])) {
    $err['erremail'] = "必須入力です。メール形式は正しく入力してください。";
  }
  if (empty($_POST['password'])) {
    $err['errpassword'] = "パスワードの入力は必須です。";
  }
  if (!empty($params)) {
    $err['errcheckemail'] = "このメールアドレスはすでに使用されています。";
  }

  if (count($err) > 0) {
    $_SESSION['errMessage'] = $err;
    header('Location:./signup.php');
  } else {
    $users->signup();
  }
  if ($_POST['role'] == 1) {
    $users->admin();
  }
  ?>


  <div class="signup">
    <div class="box">
      <div class="title">
        <p>新規登録</p>
      </div>
      <div class="line"></div>
      <div class="signtext">
        <p>登録が完了しました。</p>
        <a href="login.php">ログイン画面へ</a><br>
        <a href="index.php">トップへ戻る</a>
      </div>
    </div>

</body>

</html>
