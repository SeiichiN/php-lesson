<?php
session_start();

require_once('Player.php');
require_once('util.php');

$user = unserialize($_SESSION['user']);
$com = unserialize($_SESSION['com']);
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
      <?php echo h($user->getName()); ?> の名前:<input type="text" name="userName"/><br/>
      <?php echo h($com->getName()); ?> の名前:<input type="text" name="comName"/><br/>
      <input type="submit" value="設定終了"/>
    </form>
  </body>
</html>

<!-- 修正時刻: Mon Jan 10 07:39:08 2022 -->
