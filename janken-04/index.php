<?php
session_start();

require_once('Player.php');
require_once('util.php');

if (isset($_SESSION['user'])) {
  $user = unserialize($_SESSION['user']);
} else {
  $user = new Player("あなた");
}
if (isset($_SESSION['com'])) {
  $com = unserialize($_SESSION['com']);
} else {
  $com = new Player("わたし");
}

$_SESSION['user'] = serialize($user);
$_SESSION['com'] = serialize($com);
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>ジャンケン</title>
  </head>
  <body>
    <h1>じゃんけんゲーム</h1>
    <p><?php echo h($user->getName()) ?>の手を選んでください</p>
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

<!-- 修正時刻: Mon Jan 10 07:34:24 2022 -->
