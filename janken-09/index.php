<?php
session_start();

require_once('Player.php');
require_once('ResultStrategy.php');
require_once('RandomStrategy.php');
require_once('Strategy.php');
require_once('init.php');

// 1つでもセッションにプレーヤー情報がなければ、初期設定を行う。
if (isset($_SESSION['user']) && isset($_SESSION['com1']) && isset($_SESSION['com2'])) {
  ;
} else {
  init();
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
    <p><a href="setting.php"><button>設定</button></a></p>
    <p><a href="end.php"><button>やめる</button></a></p>
  </body>
</html>



<!-- 修正時刻: Mon Jan 17 18:35:30 2022 -->
