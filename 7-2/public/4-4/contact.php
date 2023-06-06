<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./contact.css">
  <meta name="viewport" content="width=device-width">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script type="text/javascript">
    function validate() {
      if (document.form.name.value == '' || document.form.kana.value == '' || document.form.email.value == '' || document.form.body.value == '' || document.form.tel.value.match(/[^0-9]+/)) {
        alert("氏名は必須入力です。10文字以内で入力ください。\nフリガナは必須入力です。10文字以内で入力ください。\nメールアドレスは正しくご入力ください。\n電話番号は0-9の数字のみでご入力ください。\nお問い合わせ内容は必須入力です。");
        return false;
      }
      return true;
    };
  </script>
  <title>contact</title>

</head>

<body>
  <?php include('./header.php');
  ?>
  <?php include('./form.php');
  ?>
  <div class="contact">
    <div class="contact-box">
      <div class="contact-title">
        <p>お問い合わせ</p>
      </div>
      <div class="line"></div>
      <form action="confirm.php" method="post" name="form" onsubmit=" validate();">
        <div class="contact-text">
          <h1>下記の項目をご記入の上送信ボタンを押してください</h1>
          <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
          <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
          <p><span>*</span>は必須項目となります。</p>
        </div>
        <div class="contact-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errname']) ? $_SESSION['errMessage']['errname'] : ''
            ?></div>
          <dt><label for="name">氏名<span>*</span></label></dt>
          <input type="text" name="name" placeholder="山田太郎" value="<?php if (isset($_SESSION['name'])) {
                                                                      echo $_SESSION['name'];
                                                                    }
                                                                    ?>"><br>
        </div>
        <div class="contact-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errkana']) ? $_SESSION['errMessage']['errkana'] : ''
            ?></div>
          <dt><label for="kana">フリガナ<span>*</span></label></dt>
          <input type="text" name="kana" placeholder="ヤマダタロウ" value=<?php if (isset($_SESSION['kana'])) {
                                                                      echo $_SESSION['kana'];
                                                                    };
                                                                    ?>><br>
        </div>
        <div class="contact-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errtel']) ? $_SESSION['errMessage']['errtel'] : ''
            ?></div>
          <dt><label for="tel">電話番号</label></dt>
          <input type="text" name="tel" placeholder="09012345678" value=<?php if (isset($_SESSION['tel'])) {
                                                                          echo $_SESSION['tel'];
                                                                        };
                                                                        ?>><br>
        </div>
        <div class="contact-menu">
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['erremail']) ? $_SESSION['errMessage']['erremail'] : ''
            ?></div>
          <dt><label for="mail">メールアドレス<span>*</span></label></dt>
          <input type="text" name="email" placeholder="test@test.co.jp" value=<?php if (isset($_SESSION['email'])) {
                                                                                echo $_SESSION['email'];
                                                                              };
                                                                              ?>><br>
        </div>
        <div class="contact-menu">
          <dt><label for="text">
              <h2>お問い合わせ内容をご記入ください<span>*</span></h2>
            </label></dt>
          <div class="error-msg">
            <?php echo isset($_SESSION['errMessage']['errbody']) ? $_SESSION['errMessage']['errbody'] : ''
            ?></div> <textarea type="text" name="body" id="contact" rows="10"><?php if (isset($_SESSION['body'])) {
                                                                                echo $_SESSION['body'];
                                                                              }; ?></textarea>
          <br>
        </div>
        <div class="contact-menu">
          <button class="jump-confirm" name="submit" type="submit">送信
          </button>
        </div>
    </div>
    <?php include('./db_select.php');
    ?>
    </form>
    <div class='table'>
      <table>
        <form action="edit.php" method="post">
          <tr>
            <th>ID</th>
            <th>氏名</th>
            <th>フリガナ</th>
            <th>電話番号</th>
            <th>メールアドレス</th>
            <th>お問い合わせ内容</th>
            <th>送信日時</th>
            <th>編集</th>
            <th>削除</th>
          </tr>
          <?php foreach ($result as $row) : ?>
            <tr>
              <th><?php echo htmlspecialchars($row['id']); ?></th>
              <th><?php echo htmlspecialchars($row['name']); ?></th>
              <th><?php echo htmlspecialchars($row['kana']); ?></th>
              <th><?php echo htmlspecialchars($row['tel']); ?></th>
              <th><?php echo htmlspecialchars($row['email']); ?></th>
              <th><?php echo nl2br(htmlspecialchars($row['body'])); ?></th>
              <th><?php echo htmlspecialchars($row['created_at']); ?></th>
              <th><a href="edit.php?id=<?php echo $row['id'] ?>">編集</a>

                <input type="hidden" name="id" value="<?php $row['id'] ?>">
                <input type="hidden" name="name" value="<?php $row['name'] ?>">
                <input type="hidden" name="kana" value="<?php $row['kana'] ?>">
                <input type="hidden" name="tel" value="<?php $row['tel'] ?>">
                <input type="hidden" name="email" value="<?php $row['email'] ?>">
                <input type="hidden" name="body" value="<?php $row['body'] ?>">
                <input type="hidden" name="created_at" value="<?php $row['created_at'] ?>">
              </th>
              <th><a href="delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('入力内容を削除しても良いですか？')">削除</a>

                <input type="hidden" name="id" value="<?php $row['id'] ?>">
                <input type="hidden" name="name" value="<?php $row['name'] ?>">
                <input type="hidden" name="kana" value="<?php $row['kana'] ?>">
                <input type="hidden" name="tel" value="<?php $row['tel'] ?>">
                <input type="hidden" name="email" value="<?php $row['email'] ?>">
                <input type="hidden" name="body" value="<?php $row['body'] ?>">
                <input type="hidden" name="created_at" value="<?php $row['created_at'] ?>">
              </th>
            </tr>
        </form>
      <?php endforeach; ?>
      </table>
    </div>
  </div>
  </div>
  <?php include('./footer.php');
  ?>
</body>

</html>
