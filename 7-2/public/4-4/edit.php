<?php
session_start();

if (isset($_GET['id'])) {
  try {
    include('conectDB.php');
    $dbh->beginTransaction();

    $sql = "SELECT * FROM contacts WHERE id = :id";

    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(":id" => $_GET['id']));

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['id'];
    $name = $result['name'];
    $kana = $result['kana'];
    $tel = $result['tel'];
    $email = $result['email'];
    $body = $result['body'];

    $_POST['name'] = $name;
    $_POST['kana'] = $kana;
    $_POST['tel'] = $tel;
    $_POST['email'] = $email;
    $_POST['body'] = $body;

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['kana'] = $_POST['kana'];
    $_SESSION['tel'] = $_POST['tel'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['body'] = $_POST['body'];

    $name = $_SESSION['name'];
    $kana = $_SESSION['kana'];
    $tel = $_SESSION['tel'];
    $email = $_SESSION['email'];
    $body = $_SESSION['body'];

    $dbh->commit();

    $dbh = null;
  } catch (Exception $e) {
    error_log('エラーが発生しました:' . $e->getMessage());
    $dbh->rollBack();
  }
};

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./edit.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <title>edit</title>
</head>

<body>

  <?php include('./header.php');
  ?>
  <?php include('./form.php');
  ?>

  <div class="edit">
    <div class="edit-box">
      <div class="edit-title">
        <p>お問い合わせ編集画面
        </p>
      </div>
      <div class="line"></div>
      <form action="edit2.php" method="post">
        <div class="edit-text">
          <h1>下記の項目をご記入の上更新ボタンを押してください</h1>
          <p><span>*</span>は必須項目となります。</p>
        </div>
        <div class="edit-menu">
          <input type="hidden" name="id" value="<?php if (isset($id)) {
                                                  echo $id;
                                                } ?>">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errname']) ? $_SESSION['errMessage']['errname'] : ''
            ?></div>
          <dt><label for="name">氏名<span>*</span></label></dt>
          <input type="text" name="name" placeholder="山田太郎" value="<?php if (isset($_SESSION['name'])) {
                                                                      echo $_SESSION['name'];
                                                                    }
                                                                    ?>"><br>
        </div>
        <div class="edit-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errkana']) ? $_SESSION['errMessage']['errkana'] : ''
            ?></div>
          <dt><label for="kana">フリガナ<span>*</span></label></dt>
          <input type="text" name="kana" placeholder="ヤマダタロウ" value="<?php if (isset($_SESSION['kana'])) {
                                                                        echo $_SESSION['kana'];
                                                                      };
                                                                      ?>"><br>
        </div>
        <div class="edit-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errtel']) ? $_SESSION['errMessage']['errtel'] : ''
            ?></div>
          <dt><label for="tel">電話番号</label></dt>
          <input type="text" name="tel" placeholder="09012345678" value="<?php if (isset($_SESSION['tel'])) {
                                                                            echo $_SESSION['tel'];
                                                                          };
                                                                          ?>"><br>
        </div>
        <div class="edit-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['erremail']) ? $_SESSION['errMessage']['erremail'] : ''
            ?></div>
          <dt><label for="mail">メールアドレス<span>*</span></label></dt>
          <input type="text" name="email" placeholder="test@test.co.jp" value="<?php if (isset($_SESSION['email'])) {
                                                                                  echo $_SESSION['email'];
                                                                                };
                                                                                ?>"><br>
        </div>

        <div class="edit-menu">
          <dt><label for="text">
              <h2>お問い合わせ内容をご記入ください<span>*</span></h2>
            </label></dt>
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errbody']) ? $_SESSION['errMessage']['errbody'] : ''
            ?></div> <textarea type="text" name="body" id="contact" rows="10"><?php if (isset($_SESSION['body'])) {
                                                                                echo $_SESSION['body'];
                                                                              };
                                                                              ?></textarea><br>
        </div>
        <div class="edit-menu">
          <button class="jump-edit2" name="submit" type="submit">更新
          </button>
        </div>
      </form>
    </div>
</body>
<?php include('./footer.php');
?>


</html>
