<?php

require_once('util.php');

// if (isset($_POST['userName'])) {
//   $userName = $_POST['userName'];
// } else {
//   $userName = 'あなた';
// }
// if (isset($_POST['comName'])) {
//   $comName = $_POST['comName'];
// } else {
//   $comName = 'わたし';
// }
$userName = filter_input(INPUT_POST, 'userName');
$comName = filter_input(INPUT_POST, 'comName');
if (empty($userName)) { $userName = "あなた"; }
if (empty($comName)) { $comName = "わたし"; }
?>
<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>ジャンケン</title>
  </head>
  <body>
    <h1>じゃんけんゲーム</h1>
    <p><?php echo h($userName) ?>の手を選んでください</p>
    <form action="game.php" method="post">
      <input type="hidden" name="userName" value="<?php echo $userName; ?>"/>
      <input type="hidden" name="comName" value="<?php echo $comName; ?>"/>
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


<!-- 修正時刻: Mon Jan 10 14:44:09 2022 -->

