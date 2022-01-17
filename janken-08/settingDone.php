<?php
session_start();

require_once('Player.php');
require_once('ResultStrategy.php');
require_once('RandomStrategy.php');

// セッションからプレーヤー情報を取得
$user = unserialize($_SESSION['user']);
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);

// 名前の設定
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

$user->setName($userName);
$com1->setName($com1Name);
$com2->setName($com2Name);

// 戦略の選択
$com1Strategy = filter_input(INPUT_POST, 'strategy1');
$com2Strategy = filter_input(INPUT_POST, 'strategy2');
if (empty($com1Strategy)) {
  $com1Strategy = "resultST";
}
if (empty($com2Strategy)) {
  $com2Strategy = "randomST";
}

if ($com1Strategy === "resultST") {
  $com1->setStrategy(new ResultStrategy($com1));
} else if ($com1Strategy === "randomST") {
  $com1->setStrategy(new RandomStrategy());
}
if ($com2Strategy === "resultST") {
  $com2->setStrategy(new ResultStrategy($com2));
} else if ($com2Strategy === "randomST") {
  $com2->setStrategy(new RandomStrategy());
}

$_SESSION['user'] = serialize($user);
$_SESSION['com1'] = serialize($com1);
$_SESSION['com2'] = serialize($com2);

header('Location: ' . "/");
exit;

/* 修正時刻: Mon Jan 17 11:47:00 2022*/
