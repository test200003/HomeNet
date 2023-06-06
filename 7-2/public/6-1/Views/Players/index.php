<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->index();
$param = $player->normal();

if (isset($_POST['delete'])) {
  $player->delete();
  $player->tmp();
  header('Location:index.php');
  exit;
}
if (isset($_SESSION['role'])) {
  if ($_SESSION['role'] == 0) {
    $normal = 0;
  } elseif ($_SESSION['role'] == 1) {
    $admin = 1;
  }
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

  <?php if (isset($_SESSION['role'])) : ?>

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
  <?php if (isset($admin)) : ?>
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

        <th><a href="edit.php?id=<?php echo $player['id'] ?>">編集</a>

          <form action="" method="POST">
        <th><button class="deletebtn" type="submit" onclick="return confirm('本当に削除してよろしいですか？')">削除</button>
          <input type="hidden" name='delete' value="<?= $player['id']; ?>">
          </form>
      </tr>

    <?php endforeach; ?>
  <?php endif; ?>

  <?php if (isset($normal)) : ?>

    <?php foreach ($param['players'] as $player) : ?>
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
  <?php endif; ?>
</table>

<?php if (isset($admin)) : ?>

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
<?php endif; ?>

<?php if (isset($normal)) : ?>
  <div class='paging'>
    <?php
      for ($i = 0; $i <= $param['pages']; $i++) {
        if (isset($_GET['page']) && $_GET['page'] == $i) {
          echo $i + 1;
        } else {
          echo "<a href='?page=" . $i . "'>" . ($i + 1) . "</a>";
        }
      }

    ?>
  </div>
<?php endif; ?>

</html>
<?php endif; ?>
