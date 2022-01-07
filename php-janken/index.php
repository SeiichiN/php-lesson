<?php
if (isset($_POST['userName'])) {
  $userName = $_POST['userName'];
} else {
  $userName = 'あなた';
}
if (isset($_POST['comName'])) {
  $comName = $_POST['comName'];
} else {
  $comName = 'わたし';
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
    <section class="setting">
      <h2><a href="setting.php">設定</a></h2>
    </section>
    <section>
      <h2>あそぶ</h2>
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
    </section>
  </body>
</html>

<!-- 修正時刻: Fri Jan  7 16:27:38 2022 -->
