<?php
session_start();
if (!isset($_SESSION)) {
  header('Location:./contact.php');
  exit();
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./complete.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>complete</title>
</head>

<body>
  <?php include('./header.php');
  ?>
  <?php include('./form.php');
  ?>
  <div class="complete">
    <div class="complete-box">
      <div class="complete-title">
        <p>お問い合わせ</p>
      </div>
      <div class="line"></div>
      <div class="com-tex">
        <p>お問い合わせ頂きありがとうございます。</p>
        <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
        <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
      </div>
      <dib class="back-top">
        <p><a href="./4-4.php">トップへ戻る</a></p>
      </dib>
    </div>
  </div>
  <?php include('./db_insert.php');
  ?>



  <?php include('./footer.php');
  ?>
</body>

</html>
