<?php
session_start();

$_SESSION = array();
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オブジェクト指向 - ログアウト</title>
  <link rel="stylesheet" type="text/css" href="/css/user.css">

</head>

<body>

  <div class="signup">
    <div class="box">
      <div class="title">
        <p>ログアウト</p>
      </div>
      <div class="line"></div>
      <div class="signtext">
        <p>ログアウトしました。</p>
        <a href="index.php">トップへ戻る</a>
      </div>
    </div>



</body>

</html>
