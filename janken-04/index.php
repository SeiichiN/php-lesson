<?php
session_start();

require_once('Player.php');
require_once('ResultStrategy.php');

if (! isset($_SESSION['user'])) {
  $user = new Player("あなた");
  $_SESSION['user'] = serialize($user);
}
if (! isset($_SESSION['com'])) {
  $com = new Player("わたし");
  $com->setStrategy(new ResultStrategy($com));
  // $com->setStrategy(new RandomStrategy());
  $_SESSION['com'] = serialize($com);
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

<!-- 修正時刻: Sat Jan 15 14:22:21 2022 -->
