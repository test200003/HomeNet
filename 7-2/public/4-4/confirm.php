<?php
session_start();

$referer = $_SERVER["HTTP_REFERER"];
$url = 'contact.php';
if (!strstr($referer, $url)) {
  header('Location:contact.php');
  exit;
};
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  header("Location:4-4.php");
  exit();
}
$err = [];
$_SESSION['errMessage'] = '';

$_SESSION['name'] = $_POST['name'];
$_SESSION['kana'] = $_POST['kana'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['body'] = $_POST['body'];

$name = $_SESSION['name'];
$kana = $_SESSION['kana'];
$tel = $_SESSION['tel'];
$email = $_SESSION['email'];
$body = htmlspecialchars($_SESSION["body"]);

if (empty($_POST['name'])) {
  $err['errname'] = '氏名は入力必須です。氏名は10文字以内でご入力ください。';
};
if (mb_strlen($_POST['kana']) == 0) {
  $err['errkana'] = 'フリガナは入力必須です。フリガナは10文字以内でご入力ください。';
};
if (preg_match("/[^0-9]/", $_POST['tel'])) {
  $err['errtel'] = '電話番号は0-9の数字のみでご入力ください。';
};
if (preg_match('/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/', $_POST['email']) == 0) {
  $err['erremail'] = 'メールアドレスは正しくご入力ください。';
};
if (mb_strlen($_POST['body']) == 0) {
  $err['errbody'] = 'お問い合わせ内容は必須入力です。';
};

if (count($err) > 0) {
  $_SESSION['errMessage'] = $err;
  header('Location:./contact.php');
};

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./confirm.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>confirm</title>
</head>

<body>
  <?php include('./header.php');
  ?>
  <?php include('./form.php');
  ?>

  <div class="confirm">
    <div class="confirm-box">
      <div class="confirm-title">
        <p>お問い合わせ</p>
      </div>
      <div class="line"></div>
      <form action="./complete.php" method="post">
        <div class="confirm-text">
          <p>下記の内容をご確認の上送信ボタンを押してください</p>
          <p1>内容を訂正する場合は戻るを押してください。</p1>
        </div>
        <div class="confirm-list">
          <h1>氏名</h1>
          <p>
            <?php if (isset($_POST["name"])) {
              echo htmlspecialchars($_POST["name"]);
            }; ?>
          </p>
        </div>
        <div class="confirm-list">
          <h1>フリガナ</h1>
          <p>
            <?php if (isset($_POST["kana"])) {
              echo htmlspecialchars($_POST["kana"]);
            }; ?>
          </p>
        </div>
        <div class="confirm-list">
          <h1>電話番号</h1>
          <p>
            <?php if (isset($_POST["tel"])) {
              echo htmlspecialchars($_POST["tel"]);
            }; ?>
          </p>
        </div>
        <div class="confirm-list">
          <h1>メールアドレス</h1>
          <p>
            <?php if (isset($_POST["email"])) {
              echo htmlspecialchars($_POST["email"]);
            }; ?> </p>
        </div>
        <div class="confirm-list">
          <h1>お問い合わせ</h1>
          <p>
            <?php if (isset($_POST["body"])) {
              echo nl2br($body);
            }; ?></p>
        </div>
        <div class="confirm-button">
          <button class="jump-complete" type="button"><a href="./complete.php">送信</a>
          </button>
      </form>
      <button class="back-contact" type="button" onclick="history.back()">戻る
      </button>
    </div>
    </form>
  </div>
  </div>


  <?php include('./footer.php');
  ?>
</body>

</html>
