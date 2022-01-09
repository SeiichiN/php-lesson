<?php
require_once('Player.php');
require_once('Judge.php');

if ($_POST['userName'] != "" && isset($_POST['userName'])) {
  $userName = $_POST['userName'];
}
if ($_POST['comName'] != "" && isset($_POST['comName'])) {
  $comName = $_POST['comName'];
}

if ($_POST['hand'] != "" && isset($_POST['hand'])) {
  $userHand = (int) $_POST['hand'];
} else if ($_POST['hand'] == "") {
  header("Location: " . "/");
  exit;
}
$comHand = random_int(0, 2);

/* echo 'userName:' . $userName . "<br>\n";
 * echo 'comName:' .  $comName . "<br>\n";
 * echo 'userHand:' . $userHand . "<br>\n";*/

$user = new Player($userName);
$com = new Player($comName);
$user->setHand($userHand);
$com->setHand($comHand);
$msg = Judge::execute($user, $com);
$hand = ['グー', 'チョキ', 'パー'];
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
      <?php echo $user->getName() ?>:<?php echo $hand[$user->getHand()]; ?><br/>
      <?php echo $com->getName() ?>:<?php echo $hand[$com->getHand()]; ?>
    </p>
    <p><?php echo $msg; ?></p>
    <form action="index.php" method="post">
      <input type="hidden" name="userName" value="<?php echo $user->getName(); ?>"/>
      <input type="hidden" name="comHand" value="<?php echo $com->getName(); ?>"/>
      <input type="submit" value="もどる"/>
    </form>
  </body>
</html>
<!-- 修正時刻: Sun Jan  9 18:30:00 2022 -->
