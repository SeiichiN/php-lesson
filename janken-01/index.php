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
    <section class="setting">
      <h2><a href="setting.php">設定</a></h2>
    </section>
    <section>
      <h2>あそぶ</h2>
      <p><?php echo $userName ?>の手を選んでください</p>
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
    </section>
  </body>
</html>

<!-- 修正時刻: Sat Jan  8 13:42:41 2022 -->
