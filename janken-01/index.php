<?php
$userName = 'あなた';
$comName = 'わたし';
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
      <input type="hidden" name="userName" value="<?= $userName ?>"/>
      <input type="hidden" name="comName" value="<?= $comName ?>"/>
      <input type="radio" name="hand" value="0" id="gu" />
      <label for="gu">グー</label>
      <input type="radio" name="hand" value="1" id="choki" />
      <label for="choki">チョキ</label>
      <input type="radio" name="hand" value="2" id="pa" />
      <label for="pa">パー</label><br/>
      <input type="submit" value="OK"/>
    </form>
  </body>
</html>

<!-- 修正時刻: Sat Jan 15 13:45:35 2022 -->
