<?php
session_start();
if (!isset($_SESSION)) {
  header('Location:./contact.php');
  exit();
}
session_destroy();
header('Location:./contact.php');
