<?php
require_once("Player.php");
require_once("Judge.php");

$hand = ["グー", "チョキ", "パー"];

$user = new Player("あなた");
$com = new Player("コム助");

$user->setHand(intval($_POST['hand']));
$com->setHand(rand(0, 2));

$msg = Judge::exec($user, $com);
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>結果</title>
  </head>
  <body>
    <h1>結果</h1>
    <p><?php echo $user->getName() ?>：<?php echo $hand[$user->getHand()]; ?></p>
    <p><?php echo $com->getName() ?>：<?php echo $hand[$com->getHand()]; ?></p>
    <p>判  定：<?php echo $msg ?></p>
    <p><a href="/">もう一度</a></p>
  </body>
</html>

<!-- 修正時刻: Thu Jan  6 19:33:13 2022 -->
