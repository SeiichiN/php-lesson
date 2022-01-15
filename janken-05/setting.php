<?php
session_start();

require_once('Player.php');
require_once('util.php');

$user = unserialize($_SESSION['user']);
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>設定</title>
  </head>
  <body>
    <h1>設定</h1>
    <form action="settingDone.php" method="post">
      <?php echo h($user->getName()); ?> の名前:
      <input type="text" name="userName"/><br/>

      <?php echo h($com1->getName()); ?> の名前:
      <input type="text" name="com1Name"/><br/>

      <?php echo h($com2->getName()); ?> の名前:
      <input type="text" name="com2Name"/><br/>

      <input type="submit" value="設定終了"/>
    </form>
  </body>
</html>

<!-- 修正時刻: Sat Jan 15 15:10:10 2022 -->
