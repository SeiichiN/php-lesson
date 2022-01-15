<?php
session_start();

require_once('Player.php');

$user = unserialize($_SESSION['user']);
$com = unserialize($_SESSION['com']);

$userName = filter_input(INPUT_POST, 'userName');
if (empty($userName)) {
  $userName = "あなた";
}
$comName = filter_input(INPUT_POST, 'comName');
if (empty($comName)) {
  $comName = "わたし";
}

$user->setName($userName);
$com->setName($comName);

$_SESSION['user'] = serialize($user);
$_SESSION['com'] = serialize($com);

header('Location: ' . "/");
exit;

// 修正時刻: Sat Jan 15 13:53:20 2022
