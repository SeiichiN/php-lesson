<?php
require_once("Janken.php");
require_once("JankenLogic.php");

$hand_kana = [
  'gu' => 'グー',
  'choki' => 'チョキ',
  'pa' => 'パー'
];
$hand = ["gu", "choki", "pa"];

$janken = new Janken();

$janken->user = $_POST['hand'];
$num = rand(0, 2);  // PHP7.1 以降は mt_rand()関数と同じ乱数生成器
$janken->com = $hand[$num];

JankenLogic::execute($janken);

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
<!-- 修正時刻: Sun Jun 27 09:34:42 2021 -->

