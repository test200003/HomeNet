<?php
session_start();

if (!isset($_SESSION['role'])) {
  header("Location:login.php");
  exit;
}

require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->View();
$g_params = $player->goal();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>オブジェクト指向 - 選手詳細</title>
  <link rel="stylesheet" type="text/css" href="/css/base.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>

</body>

</html>
<h2>選手詳細</h2>
<table>
  <th>No</th>
  <td><?= $params['player']['id'] ?></td>
  </tr>
  <tr>
    <th>背番号</th>
    <td><?= $params['player']['uniform_num'] ?></td>
  </tr>
  <tr>
    <th>ポジション</th>
    <td><?= $params['player']['position'] ?></td>
  </tr>
  <tr>
    <th>名前</th>

    <td><?= $params['player']['name'] ?></td>
  </tr>
  <tr>
    <th>所属</th>
    <td><?= $params['player']['club'] ?></td>
  </tr>
  <tr>
    <th>誕生日</th>
    <td><?= $params['player']['birth'] ?></td>
  </tr>
  <tr>
    <th>身長</th>

    <td><?= $params['player']['height'] ?>cm</td>
  </tr>
  <tr>
    <th>体重</th>
    <td><?= $params['player']['weight'] ?>kg</td>
  </tr>
  <tr>
    <th>国</th>
    <td><?= $params['player']['country'] ?></td>
  </tr>
  <tr>
    <th>
    <td> <a href="">編集</a>
      <a href="">削除</a>
    </td>
    </th>
  </tr>
</table>
<br>
<h2>得点履歴</h2>
<table class='goal'>
  <tr>
    <th>点数</th>
    <th>試合日時</th>
    <th>対戦相手</th>
    <th>ゴールタイム</th>
  </tr>
  <?php $i = 1; ?>
  <?php foreach ($g_params['goals'] as $goal) : ?>
    <tr>
      <td><?= $i . "点目";;
          $i++; ?></td>
      <td><?= $goal['kickoff'] ?></td>
      <td><?= $goal['enemy'] ?></td>
      <td><?= $goal['goaltime'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
<?php if ($i == 1) {
  echo 'ゴールなし';
} ?>
<p class="back-top">
  <?php
  if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 0) {
      $normal = 0;
    } elseif ($_SESSION['role'] == 1) {
      $admin = 1;
    }
  }
  ?>
  <a href="index.php">トップへ戻る</a>
  <!--
        <?php if (isset($normal)) : ?>
          <a href="normalindex.php">トップへ戻る</a>
        <?php endif; ?>
        -->
</p>
</body>
</table>
