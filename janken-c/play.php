<?php
require_once("Janken.php");

$hand_kana = [
  'gu' => 'グー',
  'choki' => 'チョキ',
  'pa' => 'パー'
];
$hand = ['gu', 'choki', 'pa'];

$user = $_POST['hand'];
$com = $hand[rand(0, 2)];
$janken = new Janken ($user, $com);
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>結果</title>
  </head>
  <h1>結果</h1>
  <p>あなた：<?php echo $hand_kana[$janken->user] ?></p>
  <p>わたし：<?php echo $hand_kana[$janken->com] ?></p>
  <p>判  定：<?php echo $janken->result ?></p>
  <p><a href="/">もう一度</a></p>
</html>
<!-- 修正時刻: Sun Jun 27 09:56:15 2021 -->

