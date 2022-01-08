<?php
session_start();

require_once('Player.php');

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
      <?php echo $user->getName(); ?> の名前:<input type="text" name="userName"/><br/>
      <?php echo $com->getName(); ?> の名前:<input type="text" name="comName"/><br/>
      <input type="submit" value="設定終了"/>
    </form>
  </body>
</html>

<!-- 修正時刻: Sat Jan  8 18:19:29 2022 -->
