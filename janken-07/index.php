<?php
session_start();

require_once('Player.php');
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
    <title>じゃんけんゲーム</title>
    <style>
     /* #gu, #choki, #pa { display: none; } */
     img { max-width: 100%; }
     .pic {
       display: inline-block;
       width: 100px;
     }
         </style>
  </head>
  <body>
    <h1>じゃんけんゲーム</h1>
    <p>手を選択してください</p>
    <form action="game.php" method="post">
      <input type="radio" name="hand" id="gu" value="0"/>
      <label for="gu" class="pic">
        <img src="img/gu.png" alt="グー"/>
      </label>

      <input type="radio" name="hand" id="choki" value="1"/>
      <label for="choki" class="pic">
        <img src="img/choki.png" alt="チョキ"/>
      </label>

      <input type="radio" name="hand" id="pa" value="2"/>
      <label for="pa" class="pic">
        <img src="img/pa.png" alt="パー"/>
      </label><br/>

      <input type="submit" value="OK"/>
    </form>
    <p><a href="setting.php">設定</a></p>
    <p><a href="end.php">やめる</a></p>
  </body>
</html>



<!-- 修正時刻: Sat Jan 15 17:40:14 2022 -->
