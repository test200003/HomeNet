<?php
$user = 'root';
$pass = 'root0316';
$dbname = 'cafe';
$dsn = 'mysql:host=localhost;dbname=cafe;charset=utf8';
$options = array(
  //SQL実行失敗時には例外をスロー
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  //カラム名をキーとする連想配列で取得する
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  //一度に結果セットを全て取得し、サーバー負荷を軽減
  PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
);
$dbh = new PDO($dsn, $user, $pass, $options);
