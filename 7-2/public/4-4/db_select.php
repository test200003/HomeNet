<?php
try {
  include('./conectDB.php');

  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM contacts";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $dbh = null;
} catch (Exception $e) {
  error_log('エラーが発生しました:' . $e->getMessage());
}
