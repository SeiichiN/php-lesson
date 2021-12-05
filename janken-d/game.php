<?php
require_once("Player.php");
require_once("Judge.php");

$hand = ["グー", "チョキ", "パー"];

$user = new Player("あなた");
$com = new Player("わたし");

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
    <p>あなた：<?php echo $hand[$user->getHand()]; ?></p>
    <p>わたし：<?php echo $hand[$com->getHand()]; ?></p>
    <p>判  定：<?php echo $msg ?></p>
    <p><a href="/">もう一度</a></p>
  </body>
</html>

<!-- 修正時刻: Sun Dec  5 17:21:44 2021 -->
