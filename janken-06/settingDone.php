<?php
session_start();

require_once('Player.php');

$userName = filter_input(INPUT_POST, 'userName');
$com1Name = filter_input(INPUT_POST, 'com1Name');
$com2Name = filter_input(INPUT_POST, 'com2Name');
if (empty($userName)) {
  $userName = "あなた";
}
if (empty($com1Name)) {
  $com1Name = "コム1";
}
if (empty($com2Name)) {
  $com2Name = "コム2";
}

$user = unserialize($_SESSION['user']);
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);
$user->setName($userName);
$com1->setName($com1Name);
$com2->setName($com2Name);

$_SESSION['user'] = serialize($user);
$_SESSION['com1'] = serialize($com1);
$_SESSION['com2'] = serialize($com2);

header('Location: ' . "/");
exit;

/* 修正時刻: Fri Jan 14 15:46:36 2022*/
