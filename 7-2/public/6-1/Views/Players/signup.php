<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
session_destroy();
$player = new PlayerController();
$c_params = $player->country();

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
  <div class="signup">
    <div class="box">
      <div class="title">
        <p>新規登録</p>
      </div>
      <div class="line"></div>
      <form action="signup2.php" method="POST">
        <div class="menu">
          <dt><label for="country">国</label></dt>
          <select name="country_id">
            <?php
            foreach ($c_params['country'] as $c_param) {
              echo '<option value="' . $c_param['id'] . '">' . $c_param['name'] . '</option>';
            }
            ?>
          </select>
        </div>
        <div class="menu">
          <dt><label for="role">権限</label></dt>
          <select name="role">
            <option value="0">一般</option>
            <option value="1">管理</option>
          </select>
        </div>
        <div class="menu">
          <div class="errmsg"> <?php echo isset($_SESSION['errMessage']['erremail']) ? $_SESSION['errMessage']['erremail'] : ''
                                ?></div>
          <div class="errmsg"><?php echo isset($_SESSION['errMessage']['errcheckemail']) ? $_SESSION['errMessage']['errcheckemail'] : ''
                              ?></div>
          <dt><label for="email">メールアドレス</label></dt>
          <input type="text" name="email" placeholder="メールアドレス" value="<?php if (isset($_SESSION['email'])) {
                                                                          echo $_SESSION['email'];
                                                                        }
                                                                        ?>">
        </div>
        <div class="menu">
          <div class="errmsg"> <?php echo isset($_SESSION['errMessage']['errpassword']) ? $_SESSION['errMessage']['errpassword'] : ''
                                ?></div>
          <dt><label for="password">パスワード</label></dt>
          <input type="password" name="password" placeholder="パスワード">
        </div>
        <div class="menu">
          <button type="submit" name="submit">登録</button>
          <a href="index.php">トップへ戻る</a>

        </div>
      </form>

    </div>
  </div>

</body>

</html>
