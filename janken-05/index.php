<?php
session_start();

require_once('Player.php');
require_once('util.php');
require_once('ResultStrategy.php');
require_once('RandomStrategy.php');

if (! isset($_SESSION['user'])) {
  $user = new Player("あなた");
  $_SESSION['user'] = serialize($user);
}
if (! isset($_SESSION['com1'])) {
  $com1 = new Player("コム1");
  $com1->setStrategy(new ResultStrategy($com1));
  $_SESSION['com1'] = serialize($com1);
}
if (! isset($_SESSION['com2'])) {
  $com2 = new Player("コム2");
  $com2->setStrategy(new RandomStrategy());
  $_SESSION['com2'] = serialize($com2);
}

?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>ジャンケン</title>
  </head>
  <body>
    <h1>じゃんけんゲーム</h1>
    <p>手を選んでください</p>
    <form action="game.php" method="post">
      <input type="radio" name="hand" value="0" id="gu" />
      <label for="gu">グー</label>
      <input type="radio" name="hand" value="1" id="choki" />
      <label for="choki">チョキ</label>
      <input type="radio" name="hand" value="2" id="pa" />
      <label for="pa">パー</label><br/>
      <input type="submit" value="OK"/>
    </form>
    <p><a href="setting.php">設定</a></p>
  </body>
</html>

<!-- 修正時刻: Sat Jan 15 16:06:01 2022 -->
