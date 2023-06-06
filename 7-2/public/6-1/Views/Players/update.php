<?php
session_start();
require_once(ROOT_PATH . 'Controllers/PlayerController.php');
$player = new PlayerController();
$params = $player->index();

$id = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
$country = htmlspecialchars($_SESSION['country'], ENT_QUOTES, 'UTF-8');
$uniform_num = htmlspecialchars($_SESSION['uniform_num'], ENT_QUOTES, 'UTF-8');
$position = htmlspecialchars($_SESSION['position'], ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
$club = htmlspecialchars($_SESSION['club'], ENT_QUOTES, 'UTF-8');
$birth = htmlspecialchars($_SESSION['birth'], ENT_QUOTES, 'UTF-8');
$height = htmlspecialchars($_SESSION['height'], ENT_QUOTES, 'UTF-8');
$weight = htmlspecialchars($_SESSION['weight'], ENT_QUOTES, 'UTF-8');

$player->edit($id, $country, $uniform_num, $position, $name, $club, $birth, $height, $weight);
$player->tmp();


header('Location: index.php');
