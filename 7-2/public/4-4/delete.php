<?php
try {
  include('conectDB.php');
  $sql = "DELETE FROM contacts WHERE id =:id";

  $stmt = $dbh->prepare($sql);
  $stmt->execute(array(":id" => $_GET['id']));

  $stmt->execute();

  $dbh->commit();
} catch (Exception $e) {
  error_log('エラーが発生しました:' . $e->getMessage());
}

header('Location:contact.php');
