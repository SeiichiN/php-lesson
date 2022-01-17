<?php
session_start();
require_once('Player.php');
require_once('ResultStrategy.php');
require_once('RandomStrategy.php');

$user = unserialize($_SESSION['user']);
$com1 = unserialize($_SESSION['com1']);
$com2 = unserialize($_SESSION['com2']);

?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>設定</title>
  </head>
  <body>
    <h1>設定</h1>
    <p>プレーヤー情報を設定してください</p>
    <form action="settingDone.php" method="post">
      <p>
        <?php echo $user->getName();?>の名前:
        <input type="text" name="userName"
               placeholder="(現在)<?php echo $user->getName();?>">
      </p>

      <p>
        <?php echo $com1->getName();?>の名前:
        <input type="text" name="com1Name"
               placeholder="(現在)<?php echo $com1->getName();?>"><br>

        <?php echo $com1->getName();?>の戦略:
        (現在<?php echo $com1->getStrategy()->getName(); ?>)
        <select name="strategy1">
          <option>選択してください</option>
          <option value="resultST">Result戦略</option>
          <option value="randomST">ランダム戦略</option>
        </select>
      </p>

      <p>
        <?php echo $com2->getName();?>の名前:
        <input type="text" name="com2Name"
               placeholder="(現在)<?php echo $com2->getName();?>"><br>

        <?php echo $com1->getName();?>の戦略:
        (現在<?php echo $com2->getStrategy()->getName(); ?>)
        <select name="strategy2">
          <option>選択してください</option>
          <option value="resultST">Result戦略</option>
          <option value="randomST">ランダム戦略</option>
        </select>
      </p>

      <input type="submit" value="設定終了">
    </form>
  </body>
</html>


<!-- 修正時刻: Mon Jan 17 12:31:15 2022 -->
