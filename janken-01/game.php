<?php
require_once('Player.php');
require_once('Judge.php');

if (isset($_POST['userName'])) {
  $userName = $_POST['userName'];
}
if (isset($_POST['comName'])) {
  $comName = $_POST['comName'];
}

if (isset($_POST['hand'])) {
  $userHand = (int) $_POST['hand'];
}
$comHand = random_int(0, 2);

echo 'userName:' . $userName . "<br>\n";
echo 'comName:' .  $comName . "<br>\n";
echo 'userHand:' . $userHand . "<br>\n";

$user = new Player($userName);
$com = new Player($comName);
$user->setHand($userHand);
$com->setHand($comHand);
$judge = new Judge();
$msg = $judge->execute($user, $com);
?>

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <title>janken</title>
  </head>
  <body>
    <h1>janken</h1>
    <p>
      <?php echo $user->getName() ?>:<?php echo $user->getHand(); ?><br/>
      <?php echo $com->getName() ?>:<?php echo $com->getHand(); ?>
    </p>
    <p><?php echo $msg; ?></p>
    <a href="/">もどる</a>
  </body>
</html>
<!-- 修正時刻: Sat Jan  8 14:34:49 2022 -->
