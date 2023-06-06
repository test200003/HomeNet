<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->normal();

if (!isset($_SESSION['role'])) {
  header("Location:login.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オブジェクト指向 - 選手一覧</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<div class='login-button'>
  <?php if (!isset($_SESSION['role'])) : ?>
    <button class="signup" type="button"><a href="signup.php">新規登録</a></button>
    <button class="login" type="button"><a href="login.php">ログイン</a></button>
  <?php endif; ?>


  <button class="logout" type="button"><a href="logout.php">ログアウト</a></button>
</div>

<h2>選手一覧</h2>
<table>
  <tr>
    <th>No</th>
    <th>背番号</th>
    <th>ポジション</th>
    <th>名前</th>
    <th>所属</th>
    <th>誕生日</th>
    <th>身長</th>
    <th>体重</th>
    <th>国</th>
  </tr>
  <?php foreach ($params['players'] as $player) : ?>
    <tr>
      <td><?= $player['id'] ?></td>
      <td><?= $player['uniform_num'] ?></td>
      <td><?= $player['position'] ?></td>
      <td><?= $player['name'] ?></td>
      <td><?= $player['club'] ?></td>
      <td><?= $player['birth'] ?></td>
      <td><?= $player['height'] ?>cm</td>
      <td><?= $player['weight'] ?>kg</td>
      <td><?= $player['country'] ?></td>

      <th><a href="view.php?id=<?php echo $player['id'] ?>">詳細</a>
    </tr>

  <?php endforeach; ?>
</table>
<div class='paging'>
  <?php
  for ($i = 0; $i <= $params['pages']; $i++) {
    if (isset($_GET['page']) && $_GET['page'] == $i) {
      echo $i + 1;
    } else {
      echo "<a href='?page=" . $i . "'>" . ($i + 1) . "</a>";
    }
  }
  ?>
</div>

</html>
