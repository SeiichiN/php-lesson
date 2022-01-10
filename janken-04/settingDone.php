<?php
session_start();

require_once('Player.php');

$user = unserialize($_SESSION['user']);
$com = unserialize($_SESSION['com']);

if ($_POST['userName']) {
  $userName = $_POST['userName'];
} else {
  $userName = "あなた"; // $user->getName();
}
if ($_POST['comName']) {
  $comName = $_POST['comName'];
} else {
  $comName = "わたし"; // $com->getName();
}

$user->setName($userName);
$com->setName($comName);

$_SESSION['user'] = serialize($user);
$_SESSION['com'] = serialize($com);

header('Location: ' . "/");
exit;

// 修正時刻: Sat Jan  8 18:16:24 2022
