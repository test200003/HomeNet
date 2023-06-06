<?php
session_start();

if ($_SESSION['role'] == 0 or !isset($_SESSION['role'])) {
  header("Location:login.php");
  exit;
}
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->view();
$c_params = $player->country();

$params['player']['id'];

$id = $params['player']['id'];
$uniform_num  = $params['player']['uniform_num'];
$position = $params['player']['position'];
$name = $params['player']['name'];
$club = $params['player']['club'];
$birth = $params['player']['birth'];
$height = $params['player']['height'];
$weight = $params['player']['weight'];
$country = $params['player']['country'];
$err = [];
if (!empty($_POST['edit'])) {

  $_SESSION['id'] = $_POST['id'];
  $_SESSION['country'] = $_POST['country'];
  $_SESSION['uniform_num'] = $_POST['uniform_num'];
  $_SESSION['position'] = $_POST['position'];
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['club'] = $_POST['club'];
  $_SESSION['birth'] = $_POST['birth'];
  $_SESSION['height'] = $_POST['height'];
  $_SESSION['weight'] = $_POST['weight'];
  $_SESSION['country'] = $_POST['country'];

  if (!preg_match("/^[0-9]+$/", $_POST['uniform_num'])) {
    $err['erruni'] = "0-9の数字のみでご入力ください。";
  }
  if (empty($_POST['name'])) {
    $err['errname'] =  "名前の入力は必須です。";
  }
  if (empty($_POST['club'])) {
    $err['errclub'] =  "所属の入力は必須です。";
  }
  if (empty($_POST['birth'])) {
    $err['errbirth'] =  "誕生日の入力は必須です。";
  } else {
    $data = $_POST['birth'];
    if (preg_match('/\A[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}\z/', $data) == false) {
      $err['errbirth'] =  "入力形式が正しくありません。(例:1992-12-15)";
    } else {
      list($year, $month, $day) = explode('-', $data);
      if (checkdate($month, $day, $year) == false) {
        $err['errbirth'] = "該当の日付は存在していません。";
      }
    }
  }
  if (empty($_POST['height']) || !preg_match("/^[0-9]+$/", $_POST['height'])) {
    $err['errheight'] =  "身長の入力は必須です。0-9の数字のみでご入力ください。";
  }
  if (empty($_POST['weight']) || !preg_match("/^[0-9]+$/", $_POST['weight'])) {
    $err['errweight'] =  "体重の入力は必須です。0-9の数字のみでご入力ください。";
  }
  if (count($err) == 0) {
    header('Location: update.php');
  }
};

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オブジェクト指向 - 編集画面</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>

<body>
  <h2>編集</h2>
  <form action="" method="POST">
    <table class="edit">
      <tr>
        <th>NO</th>
        <td>
          <input type="hidden" name="id" value="<?= $id; ?>">
          <?= $id; ?>
        </td>
      </tr>
      <tr>
        <th>背番号 </th>
        <td>
          <input type="text" name="uniform_num" value="<?php if (isset($_POST['uniform_num'])) {
                                                          echo $_POST['uniform_num'];
                                                        } else {
                                                          echo $uniform_num;
                                                        } ?>">
          <span><?php if (isset($err['erruni'])) {
                  echo $err['erruni'];
                } ?></span>
        </td>
      </tr>
      <tr>
        <th>ポジション</th>
        <td>
          <select name="position">
            <option value="MF">MF</option>
            <option value="GK">GK</option>
            <option value="DF">DF</option>
            <option value="FW">FW</option>
          </select>
        </td>
      </tr>
      <tr>
        <th>名前</th>
        <td>
          <input type="text" name="name" value="<?php if (isset($_POST['name'])) {
                                                  echo $_POST['name'];
                                                } else {
                                                  echo $name;
                                                } ?>">
          <span><?php if (isset($err['errname'])) {
                  echo $err['errname'];
                } ?></span>
        </td>
      </tr>
      <tr>
        <th>所属</th>
        <td>
          <input type="text" name="club" value="<?php if (isset($_POST['club'])) {
                                                  echo $_POST['club'];
                                                } else {
                                                  echo $club;
                                                } ?>">
          <span><?php if (isset($err['errclub'])) {
                  echo $err['errclub'];
                } ?></span>
        </td>
      </tr>
      <tr>
        <th>誕生日</th>
        <td>
          <input type="text" name="birth" value="<?php if (isset($_POST['birth'])) {
                                                    echo $_POST['birth'];
                                                  } else {
                                                    echo $birth;
                                                  } ?>">
          <span><?php if (isset($err['errbirth'])) {
                  echo $err['errbirth'];
                } ?></span>
        </td>
      </tr>
      <tr>
        <th>身長</th>
        <td>
          <input type="text" name="height" value="<?php if (isset($_POST['height'])) {
                                                    echo $_POST['height'];
                                                  } else {
                                                    echo $height;
                                                  } ?>">
          <span><?php if (isset($err['errheight'])) {
                  echo $err['errheight'];
                } ?></span>
        </td>
      </tr>
      <tr>
        <th>体重</th>
        <td>
          <input type="text" name="weight" value="<?php if (isset($_POST['weight'])) {
                                                    echo $_POST['weight'];
                                                  } else {
                                                    echo $weight;
                                                  } ?>">
          <span><?php if (isset($err['errweight'])) {
                  echo $err['errweight'];
                } ?></span>
        </td>
      <tr>
        <th>国</th>
        <td>
          <select name="country">
            <?php
            foreach ($c_params['country'] as $c_param) {
              echo '<option value="' . $c_param['id'] . '">' . $c_param['name'] . '</option>';
            }
            ?>
          </select>
        </td>
      </tr>

  </form>
  </table>
</body>
<button type="submit" onclick="return confirm('編集を完了してよろしいですか？')">編集</button><br>
<input type="hidden" name="edit" value="<?= $id; ?>">
<a href="index.php">トップへ戻る</a>

</html>
