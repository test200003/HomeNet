<?php
try {
  include('conectDB.php');
  $dbh->beginTransaction();

  $sql = "INSERT INTO contacts (name,kana,tel,email,body,created_at)
    VALUES (:name, :kana, :tel, :email, :body, :created_at)";
  $stmt = $dbh->prepare($sql);

  $stmt->bindParam(":name", $_SESSION["name"], PDO::PARAM_STR);
  $stmt->bindParam(":kana", $_SESSION["kana"], PDO::PARAM_STR);
  $stmt->bindParam(":tel", $_SESSION["tel"], PDO::PARAM_STR);
  $stmt->bindParam(":email", $_SESSION["email"], PDO::PARAM_STR);
  $stmt->bindParam(":body", $_SESSION["body"], PDO::PARAM_STR);
  $stmt->bindValue(':created_at', date("Y/m/d H:i:s"));
  $dbh->commit();

  $stmt->execute();
} catch (Exception $e) {
  error_log('エラーが発生しました:' . $e->getMessage());
}
