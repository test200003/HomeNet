<?php

session_start();
$err = [];
$_SESSION['errMessage'] = '';
$id = $_POST['id'];
$name = $_POST['name'];
$kana = $_POST['kana'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$body = $_POST['body'];

if (empty($name)) {
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
  header('Location:./edit.php');
};

if (!isset($id)) {
  header('Location:./contact.php');
  exit();
}
try {
  include('conectDB.php');
  $dbh->beginTransaction();

  $sql = "UPDATE contacts SET name = :name, kana= :kana, tel = :tel, email = :email, body = :body WHERE id=:id";
  $stmt = $dbh->prepare($sql);

  $stmt->execute([":name" => $name, ":kana" => $kana, ":tel" => $tel, ":email" => $email, ":body" => $body, ":id" => $id]);

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $dbh->commit();
} catch (Exception $e) {
  error_log('エラーが発生しました:' . $e->getMessage());
  $dbh->rollBack();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./edit2.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>edit2</title>
</head>

<body>
  <?php include('./header.php');
  ?>
  <?php include('./form.php');
  ?>
  <form action="edit2.php" method="post">
    <input type="hidden" name="id" value="<?php if (isset($id)) {
                                            echo $id;
                                          } ?>">
    <div class="edit2">
      <div class="edit2-box">
        <div class="edit2-title">
          <p>お問い合わせ</p>
        </div>
        <div class="line"></div>
        <div class="edit2-tex">
          <p>編集完了</p>
          <p>ID「<?php echo $id; ?>」を編集しました。</p>

        </div>
        <dib class="back-top">
          <button2 name="submit" type="submit">
            <p><a href="./editcom.php">お問い合わせフォームに戻る</a></p>
          </button2>

        </dib>
      </div>
    </div>

    <?php include('./footer.php');
    ?>
</body>

</html>
